<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestoransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restorans', function (Blueprint $table) {
            $table->id();

            // $table->integer('menu_id')->nullable();
            $table->string('nama_resto',20);
            $table->text('alamat')->nullable();
            $table->string('telp')->unique()->nullable();
            $table->string('jam_buka')->nullable();
            $table->float('rating')->nullable();


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
        Schema::dropIfExists('restorans');
    }
}
