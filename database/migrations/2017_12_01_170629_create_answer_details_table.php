<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswerDetailsTable extends Migration
{

    /**
     * @var string
     */
    static $tableName = 'answer_details';
    /**
     * @var Illuminate\Database\Schema\Builder
     */
    private $schema;

    /**
     * CreateCounselorAccount constructor.
     */
    public function __construct()
    {
        $this->schema = \Illuminate\Support\Facades\Schema::getFacadeRoot();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!$this->schema->hasTable(self::$tableName))
        {
            /** @var Illuminate\Database\Connection $db */
            $db = \Illuminate\Support\Facades\DB::getFacadeRoot();
            $this->schema->create(self::$tableName, function (Blueprint $table) use ($db) {
                $table->increments('id');
                $table->integer('answer_code')->unsigned();
                $table->integer('question')->unsigned();
                $table->integer('order')->unsigned();
                $table->integer('answer')->unsigned()->nullable();
                $table->integer('favour')->unsigned()->nullable();
                $table->integer('scale')->unsigned()->nullable();
                $table->timestamp('answered_at')->nullable()->default(null);
                $table->timestamp('updated_at')->nullable()->default(null);
                $table->foreign('answer_code')
                    ->references('id')->on(CreateAnswersTable::$tableName)
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('question')
                    ->references('id')->on(CreateQuestionsTable::$tableName)
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('answer')
                    ->references('id')->on(CreateQuestionOptionsTable::$tableName)
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('favour')
                    ->references('id')->on(CreateQuestionFavoursTable::$tableName)
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            });
        }
        else
        {
            echo 'Table Already Exists';
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ($this->schema->hasTable(self::$tableName))
        {
            $tableName = self::$tableName;
            $this->schema->table(self::$tableName, function (Blueprint $table) use ($tableName) {
                $table->dropForeign("{$tableName}_answer_code_foreign");
                $table->dropForeign("{$tableName}_question_foreign");
                $table->dropForeign("{$tableName}_answer_foreign");
                $table->dropForeign("{$tableName}_favour_foreign");
            });
        }
        else
        {
            echo 'Table Not Exists';
        }

        $this->schema->dropIfExists(self::$tableName);
    }

}
