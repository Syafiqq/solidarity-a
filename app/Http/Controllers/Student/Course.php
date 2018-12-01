<?php namespace App\Http\Controllers\Student;

use App\Eloquent\Answer;
use App\Eloquent\AnswerDetail;
use App\Eloquent\AnswerResult;
use App\Eloquent\Question;
use App\Eloquent\QuestionCategory;
use App\Eloquent\QuestionOption;
use App\Eloquent\User;
use App\Eloquent\UserStudents;
use App\Http\Controllers\Controller;
use App\Http\Utils\Order\Generation\ShuffledGeneration;
use App\Model\AnswerResultCalculator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Course extends Controller
{
    use ShuffledGeneration;
    use AnswerResultCalculator;

    public function index()
    {
        /** @var User $user */
        $user = \Illuminate\Support\Facades\Auth::user();

        return view("layout.student.course.index.student_course_index_$this->theme", compact('user'));
    }

    public function create()
    {
        /** @var User $user */
        $user = \Illuminate\Support\Facades\Auth::user();

        $questionCategories = Question::where('active', '=', true)->distinct()->lists('category');
        $questions          = Question::where('active', '=', true)->lists('id');
        $order              = $this->generateCourseOrder();

        $answer = new Answer();
        $answer->setAttribute('started_at', Carbon::now());
        $user->answer()->save($answer);

        DB::transaction(function () use ($order, $questionCategories, $answer, $questions) {
            foreach ($questions as $k => $question)
            {
                $answerDetail = new AnswerDetail();
                $answerDetail->setAttribute('question', $order[$k]);
                $answerDetail->setAttribute('order', $question);
                $answer->answer_detail()->save($answerDetail);
            }
            foreach ($questionCategories as $questionCategory)
            {
                $answerResult = new AnswerResult();
                $answerResult->setAttribute('category', $questionCategory);
                $answer->answer_result()->save($answerResult);
            }
        });

        return redirect(route('student.course.start.edit', [1]))->with('cbk_msg', ['notify' => ['Selamat Mengerjakan']]);
    }

    /**
     * @param int $question
     * @param AnswerDetail $answer
     * @return \Illuminate\View\View
     */
    public function startEdit($question, AnswerDetail $answer)
    {
        $question = intval($question);
        $answers  = \Illuminate\Support\Facades\Auth::user()->getAttribute('answer')->last()->answer_detail()->whereBetween('order', [$question - 1, $question + 1])->select('id', 'question', 'order', 'answer')->get();
        $current  = $answer;
        $prev     = null;
        $next     = null;

        /** @var Answer $answer */
        foreach ($answers as $answer)
        {
            $answer_question = intval($answer->getAttribute('order'));
            if ($answer_question === ($question - 1))
            {
                $prev = $answer;
            }
            else if ($answer_question === ($question))
            {
                $current = $answer;
            }
            else if ($answer_question === ($question + 1))
            {
                $next = $answer;
            }
        }
        unset($answers);

        $question = Question::where('id', '=', $current['question'])->first();
        $options  = QuestionOption::all();
        $summary  = \Illuminate\Support\Facades\Auth::user()->getAttribute('answer')->last()->answer_detail()->get(['id', 'question', 'order', 'answer']);

        return view("layout.student.course.start.student_course_start_$this->theme", compact('prev', 'current', 'next', 'question', 'options', 'summary'));
    }

    /**
     * @param $question
     * @param AnswerDetail $answer
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function startUpdate($question, AnswerDetail $answer, Request $request)
    {
        /**
         * @param $question
         * @return \Illuminate\Http\RedirectResponse
         */
        function resolveNext($question)
        {
            /** @var AnswerDetail $next */
            $next = \Illuminate\Support\Facades\Auth::user()->getAttribute('answer')->last()->answer_detail()->where('order', $question)->select('id', 'question', 'order', 'answer')->first();
            if (is_null($next))
            {
                return redirect()->back();
            }
            else
            {
                return redirect()->route('student.course.start.edit', [$next->getAttribute('order')]);
            }
        }

        /** @var Question $question */
        $question = Question::where('id', '=', $answer->{'question'})->first();
        $scale    = QuestionOption::all()->count();
        $answer->setAttribute('answer', $request->get('answer'));
        $answer->setAttribute('favour', $question->getAttribute('favour'));
        $answer->setAttribute('scale', $scale);
        if (is_null($answer->getAttribute('answered_at')))
        {
            $answer->setAttribute('answered_at', Carbon::now());
        }
        else
        {
            $answer->setAttribute('updated_at', Carbon::now());
        }
        $answer->save();

        return resolveNext($answer->{'order'} + 1)->with('cbk_msg', ['notify' => ['Jawaban Berhasil Disimpan']]);
    }

    public function submit()
    {
        /**
         * @var Answer $answer
         * @var UserStudents $student
         */
        $answer  = \Illuminate\Support\Facades\Auth::user()->getAttribute('answer')->last();
        $student = \Illuminate\Support\Facades\Auth::user()->getAttribute('student')->first();
        $this->calculate($answer);
        $answer->setAttribute('finished_at', Carbon::now());
        $student->setAttribute('active', false);

        $student->save();
        $answer->save();

        return redirect(route('student.course.index'))->with('cbk_msg', ['notify' => ['Terima Kasih']]);
    }

    public function result()
    {
        $categories = QuestionCategory::all();
        $report     = \Illuminate\Support\Facades\Auth::user();

        return view("layout.student.course.result.student_course_result_$this->theme", compact('categories', 'report'));
    }

    public function detail($answer)
    {
        /** @var Answer $student */
        $student = User::with(['answer' => function ($query) use ($answer) {
            $query->with('answer_result')->where('id', '=', $answer);
        }])->where('id', '=', \Illuminate\Support\Facades\Auth::user()->getKey())->first();

        return view("layout.student.course.detail.student_course_detail_$this->theme", compact('student'));
    }
}
