<?php

use Illuminate\Database\Migrations\Migration;

class AddGradeAndActiveForUserStudentsTable extends Migration
{
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
        $this->schema->table(CreateUserStudentsTable::$tableName, function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->integer('grade')->unsigned();
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->table(CreateUserStudentsTable::$tableName, function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->dropColumn('active');
            $table->dropColumn('grade');
        });
    }

}
