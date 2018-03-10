<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->integer('email_confirm')->default('0')->after('password');
            $table->string('first_name', 100)->after('id');
            $table->string('country', 100)->after('name')->nullable();
            $table->string('city', 100)->after('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('email_confirm');
            $table->dropColumn('first_name');
            $table->dropColumn('country');
            $table->dropColumn('city');
        });
    }
}
