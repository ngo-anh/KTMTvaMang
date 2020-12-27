<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleIdColumnAndStatusColumnToUsersTable extends Migration
{
    private $tableName = 'users';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->tableName)) {
            $this->editTable();
        }
    }

    /**
     * Edit Table.
     *
     * @return void
     */
    private function editTable()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->foreignId('role_id')
                ->constrained('roles')
                ->after('password')
                ->default(2)
                ->comment('Role ID');

            $table->boolean('status')
                ->after('role_id')
                ->default(1)
                ->comment('0 -> Disabled | 1 -> Enabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable($this->tableName)) {
            $this->dropColumnsAdded();
        }
    }

    private function dropColumnsAdded()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->dropColumn('role_id', 'status');
        });
    }
}
