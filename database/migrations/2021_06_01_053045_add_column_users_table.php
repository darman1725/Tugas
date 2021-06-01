<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nim', 10)->nullable()->after('username');
            $table->string('prodi', 50)->nullable()->after('email');
            $table->string('jurusan', 30)->nullable()->after('prodi');
            $table->string('phone', 15)->nullable()->after('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nim');
            $table->dropColumn('prodi');
            $table->dropColumn('jurusan');
            $table->dropColumn('phone');
        });
    }
}