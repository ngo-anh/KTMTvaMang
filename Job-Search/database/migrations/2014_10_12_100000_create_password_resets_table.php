<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration
{
    private $tableName = 'password_resets';
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
            $table->string('email')
                ->index()
                ->comment('Email address');
            $table->string('token')
                ->comment('Token');
            $table->timestamp('created_at')
                ->nullable()
                ->comment('Created at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
