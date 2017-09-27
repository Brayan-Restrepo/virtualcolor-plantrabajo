<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
	protected $table = 'actividad';

	/**
	 * The attributes that are mass assignable.
	 * 
	 * @var array
	 */
	protected $guarded = ['id'];
	protected $fillable = [
		'sede',
		'actividad',
		'plan_trabajo_id'
		];

	public function planTrabajo()
    {
        return $this->belongsTo('App\Model\PlanTrabajo');
    }
}
