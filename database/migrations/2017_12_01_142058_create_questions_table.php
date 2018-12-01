<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration
{

    /**
     * @var string
     */
    static $tableName = 'questions';
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
                $table->string('question');
                $table->integer('category')->unsigned();
                $table->integer('favour')->unsigned();
                $table->boolean('active')->default(true);
                $table->timestamp('created_at')->default($db->raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default($db->raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
                $table->foreign('category')
                    ->references('id')->on(CreateQuestionCategoriesTable::$tableName)
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
            $this->schema->table(self::$tableName, function (Blueprint $table) {
                $table->dropForeign('questions_category_foreign');
                $table->dropForeign('questions_favour_foreign');
            });
        }
        else
        {
            echo 'Table Not Exists';
        }

        $this->schema->dropIfExists(self::$tableName);
    }
}
