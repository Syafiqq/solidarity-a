<?php namespace App\Http\Controllers\Student;

use App\Eloquent\User;
use App\Eloquent\UserStudents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Profile extends Controller
{
    /**
     * @var UserStudents
     */
    private $student;


    /**
     * Profile constructor.
     */
    public function __construct()
    {
        parent::__construct();
        /** @var User $user */
        /** @noinspection PhpUndefinedMethodInspection */
        $user          = \Illuminate\Support\Facades\Auth::user();
        $this->student = $user ? $user->getAttribute('student') : null;
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view("layout.student.profile.edit.student_profile_edit_$this->theme", ['student' => $this->student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'school' => 'required',
            'grade' => 'required',
        ]);

        $student = $request->only(['school', 'grade']);

        $this->student->update($student);

        return redirect()->back()->with('cbk_msg', ['notify' => ['Perubahan Berhasil']]);
    }
}
