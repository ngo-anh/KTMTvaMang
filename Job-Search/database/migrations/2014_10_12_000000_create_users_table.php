<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    private $tableName = 'users';

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
            $table->string('name')
                ->comment('Name of User');

            $table->string('email')
                ->unique()
                ->comment('Email address');

            $table->timestamp('email_verified_at')
                ->nullable()
                ->comment('Date of last verified email');

            $table->string('password')
                ->comment('Password');

            $table->rememberToken()
                ->comment('Remember Token');

            $table->foreignId('current_team_id')
                ->contrained()
                ->nullable()
                ->comment('ID Team');

            $table->text('profile_photo_path')
                ->nullable()
                ->comment('Path of Profile Photo');

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
