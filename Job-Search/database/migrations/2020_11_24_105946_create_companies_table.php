<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    private $tableName = 'companies';
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
            $table->string('name')
                ->comment('Name of Company');
            $table->text('image_path')
                ->nullable()
                ->comment('Path of image company');
            $table->text('description')
                ->nullable()
                ->comment('Description of Company');
            $table->text('address')
                ->nullable()
                ->comment('Address of Company');
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
