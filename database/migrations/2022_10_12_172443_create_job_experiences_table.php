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
        Schema::create('job_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('position');
            $table->string('company_name');
            $table->date('bulanmulai');
            $table->date('tahunmulai');
            $table->date('bulanakhir');
            $table->date('tahunakhir');
            $table->string('media')->null();
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
        Schema::dropIfExists('job_experiences');
    }
};
