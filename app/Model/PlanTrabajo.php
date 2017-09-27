<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PlanTrabajo extends Model
{
    protected $table = 'plan_trabajo';

	/**
	 * The attributes that are mass assignable.
	 * 
	 * @var array
	 */
	protected $guarded = ['id'];
	protected $fillable = [
		'fecha_inicio',
		'fecha_finalizacion',
		'responsable',
		'avance',
		'objetivo',
		'ruta_imagen'
		];

	public function actividad()
    {
        return $this->hasMany('App\Model\Actividad');
    }
}