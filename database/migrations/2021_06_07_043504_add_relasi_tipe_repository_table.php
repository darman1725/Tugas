<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelasiTipeRepositoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repository', function (Blueprint $table) {
            $table->dropColumn('jenis');
            $table->unsignedBigInteger('tipe_id')->after('judul')->nullable();
            $table->foreign('tipe_id')->references('id')->on('tipe_dokumen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repository', function (Blueprint $table) {
            $table->dropColumn('tipe_id');
        });
    }
}