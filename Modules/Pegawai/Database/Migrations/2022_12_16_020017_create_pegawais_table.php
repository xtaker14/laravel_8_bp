<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('email', 50);
            $table->string('no_phone', 20);
            $table->text('address')->nullable();
            
            $table->dateTime('created_date', $precision = 0)
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_date', $precision = 0)
                ->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP')); 

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
        Schema::dropIfExists('pegawai');
    }
}
