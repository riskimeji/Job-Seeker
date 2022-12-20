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
            $table->foreignId('user_id'); //id user
            $table->foreignId('category_id'); //kategori job
            $table->foreignId('jenjang_pendidikan_id'); //lulusan
            $table->foreignId('jurusan_pendidikan_id'); //jurusan
            $table->foreignId('jenjang_karir_id'); // jenjangkarir
            $table->foreignId('minimal_pengalaman_id'); // lama minimal pengalaman bekerja
            $table->string('title'); // judul lowongan
            $table->string('est_gaji'); // estimasi gaji
            $table->string('slug',255)->nullable(); // slug
            $table->string('fungsi_kerja')->nullable(); // fungsi kejra
            $table->text('persyaratan'); // syarat pekerjaan
            $table->text('tanggung_jawab'); // tanggung jawab pekerjaan
            $table->string('media'); // foto lowongan
            $table->string('google_map'); // link google map toko
            $table->string('alamat'); // alamat tempat bekerja atau nama toko
            $table->string('status'); // status lowngan aktif atau tidak
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
