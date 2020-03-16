<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->integer('leavetype_id')->unsigned();

            $table->datetime('fh_from');
            $table->datetime('fh_to');
            $table->mediumtext('description');
           
            $table->enum('resp_status',['AUTORIZADO','RECHAZADO','EN ESPERA'])->default('EN ESPERA');
            $table->mediumtext('resp_msg')->nullable();
            $table->datetime('resp_chdate')->nullable();
            $table->string('resp_name')->nullable();
            $table->integer('isread')->nullable();
            $table->enum('status',['ACTIVO','SUSPENDIDO'])->default('ACTIVO');


            $table->timestamps();

            //Relaciones
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade');
            
            $table->foreign('leavetype_id')->references('id')->on('leavetypes')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
