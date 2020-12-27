<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfomationColumnsToUsersTable extends Migration
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
            $table->string('phone_number', 30)
                ->after('status')
                ->nullable()
                ->index()
                ->comment('Phone Number');

            $table->string('address')
                ->after('phone_number')
                ->nullable()
                ->index()
                ->comment('Address');

            $table->date('date_of_birth')
                ->after('address')
                ->nullable()
                ->comment('Date of birth');

            $table->foreignId('gender_id')
                ->constrained('genders')
                ->after('date_of_birth')
                ->defaut(3)
                ->comment('Gender ID');
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
            $table->dropColumn('phone_number', 'address', 'date_of_birth');
        });
    }
}
