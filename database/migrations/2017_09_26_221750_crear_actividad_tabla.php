<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearActividadTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad',function(Blueprint $table){
            $table -> increments('id');
            $table -> string('sede');
            $table -> string('actividad');

            $table->integer('plan_trabajo_id')->unsigned();
            $table->foreign('plan_trabajo_id')
                  ->references('id')->on('plan_trabajo')
                  ->onDelete('cascade');        
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
        Schema::drop('actividad');
    }
}
