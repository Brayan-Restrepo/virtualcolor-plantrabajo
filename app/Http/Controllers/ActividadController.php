<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\PlanTrabajo;
use App\Model\Actividad;
use App\Http\Requests\CrearActividadRequest;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearActividadRequest $request)
    {
        if ($request->fails()) {
            dd("--------");
        }

        $actividad = Actividad::create($request->all());

        //dd($actividad->planTrabajo->fecha_inicio);
        $json = [
            'id'        =>  $actividad->id,
            'sede'      =>  $actividad->sede,
            'actividad' =>  $actividad->actividad,
            'plan_trabajo_id'=>  $actividad->plan_trabajo_id,
            'fecha_inicio' => $actividad->planTrabajo->fecha_inicio,
            'fecha_finalizacion' => $actividad->planTrabajo->fecha_finalizacion,
            'avance' => $actividad->planTrabajo->avance,
            'responsable' => $actividad->planTrabajo->responsable
            ];
        //dd($json);
        return Response()->json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividad = Actividad::findOrFail($id);
        $json = [
            'id'        =>  $actividad->id,
            'sede'      =>  $actividad->sede,
            'actividad' =>  $actividad->actividad,
            'plan_trabajo_id'=>  $actividad->plan_trabajo_id,
            'fecha_inicio' => $actividad->planTrabajo->fecha_inicio,
            'fecha_finalizacion' => $actividad->planTrabajo->fecha_finalizacion,
            'avance' => $actividad->planTrabajo->avance,
            'responsable' => $actividad->planTrabajo->responsable
            ];
        return response()->json($json);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->fill($request->all());
        $actividad->save();
        $json = [
            'id'        =>  $actividad->id,
            'sede'      =>  $actividad->sede,
            'actividad' =>  $actividad->actividad,
            'plan_trabajo_id'=>  $actividad->plan_trabajo_id,
            'fecha_inicio' => $actividad->planTrabajo->fecha_inicio,
            'fecha_finalizacion' => $actividad->planTrabajo->fecha_finalizacion,
            'avance' => $actividad->planTrabajo->avance,
            'responsable' => $actividad->planTrabajo->responsable
            ];
        return response()->json($json);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->delete();
        return response()->json('true');
        
    }
}
