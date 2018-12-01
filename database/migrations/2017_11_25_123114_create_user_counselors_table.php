<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserCounselorsTable extends Migration
{
    /**
     * @var string
     */
    static $tableName = 'user_counselors';
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
                $table->integer('user')->unsigned();
                $table->string('school', 100)->nullable();
                $table->string('school_head', 100)->nullable();
                $table->string('school_head_credential', 100)->nullable();
                $table->foreign('user')
                    ->references('id')->on(CreateUsersTable::$tableName)
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
                $table->dropForeign('user_counselors_user_foreign');
            });
        }
        else
        {
            echo 'Table Not Exists';
        }

        $this->schema->dropIfExists(self::$tableName);
    }
}
