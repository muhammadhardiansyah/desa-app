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
        Schema::create('transparencies', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('PAD');
            $table->string('DD');
            $table->string('BHP');
            $table->string('ADD');
            $table->string('t_pendapatan');
            $table->string('pemerintahan');
            $table->string('pembangunan');
            $table->string('pembinaan');
            $table->string('pemberdayaan');
            $table->string('darurat');
            $table->string('t_belanja');
            $table->string('surdef');
            $table->string('p_pembiayaan');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('transparencies');
    }
};
