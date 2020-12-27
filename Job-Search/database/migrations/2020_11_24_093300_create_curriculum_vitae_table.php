<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumVitaeTable extends Migration
{
    private $tableName = "curriculum_vitae";
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
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable()
                ->comment('ID of the user');
            $table->string('title')->comment('Title of CV');
            $table->string('apply_position')->comment('Apply Position');
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
