<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearPlantrabajoTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_trabajo',function(Blueprint $table){
            $table -> increments('id');
            $table -> date('fecha_inicio');
            $table -> date('fecha_finalizacion');
            $table -> string('responsable');
            $table -> string('avance');
            $table -> text('objetivo');
            $table -> text('ruta_imagen');            
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
        Schema::drop('plan_trabajo');
    }
}
