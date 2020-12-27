<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoFactorColumnsToUsersTable extends Migration
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
            $table->text('two_factor_secret')
                ->after('gender_id')
                ->nullable()
                ->comment("Two Factor Secret");

            $table->text('two_factor_recovery_codes')
                ->after('two_factor_secret')
                ->nullable()
                ->comment("Two Factor Recovery Codes");
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
            $table->dropColumn('two_factor_secret', 'two_factor_recovery_codes');
        });
    }
}
