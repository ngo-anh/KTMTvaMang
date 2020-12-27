<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentsTable extends Migration
{
    private $tableName = 'recruitments';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tableName)) {
            $this->createTable();
        }
    }

    private function createTable()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')
                ->constrained('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable()
                ->comment('ID of the company');
            $table->string('title')
                ->comment('Title of Job');
            $table->string('apply_for')
                ->comment('Apply Position');
            $table->bigInteger('salary')
                ->comment('Salary ( USD )');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
