<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('job_category_id');
            $table->foreignId('province_id');
            $table->foreignId('city_id');
            $table->string('title');
            $table->string('jenjang_karir');
            $table->string('est_gaji');
            $table->string('penglaman_kerja');
            $table->string('lulusan');
            $table->text('description');
            $table->text('tanggung_jawab');
            $table->string('status');
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
        Schema::dropIfExists('lowongans');
    }
};
