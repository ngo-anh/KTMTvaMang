<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    private $tableName = 'sessions';
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

    /**
     * Create table.
     *
     * @return void
     */
    private function createTable()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')
                ->nullable()
                ->index();
            $table->string('ip_address', 45)
                ->nullable();
            $table->text('user_agent')
                ->nullable();
            $table->text('payload');
            $table->integer('last_activity')
                ->index();
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
