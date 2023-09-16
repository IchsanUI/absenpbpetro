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
        Schema::create('data_atlitPB', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->string('namaPanggilan');
            $table->integer('banyakAbsen')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_atlitPB');
    }
};
