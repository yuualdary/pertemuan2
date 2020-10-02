<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->bigIncrements('student_id');
            $table->string('student_name');
            $table->integer('nim');
            $table->string('faculty');
            $table->integer('ext');
            $table->integer('whatsapp');
            // $table->timestamps();
            $table->date('std_create_at');
            $table->integer('std_modified_by');
            $table->integer('std_created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
