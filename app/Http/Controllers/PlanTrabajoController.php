<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\PlanTrabajo;
use App\Http\Requests\CrearPlanTrabajoRequest;

class PlanTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
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
    public function store(CrearPlanTrabajoRequest $request)
    {
        
        $planTrabajo = PlanTrabajo::create($request->all());
        $json = [
            'id'                =>  $planTrabajo->id,
            'fecha_inicio'      =>  $planTrabajo->fecha_inicio,
            'fecha_finalizacion'=>  $planTrabajo->fecha_finalizacion,
            'responsable'       =>  $planTrabajo->responsable,
            'avance'            =>  $planTrabajo->avance,
            'objetivo'          =>  $planTrabajo->objetivo,
            'ruta_imagen'       =>  $planTrabajo->ruta_imagen,
            ];
        //dd($request->fecha_inicio);
        return Response()->json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlanTabajo  $planTabajo
     * @return \Illuminate\Http\Response
     */
    public function show(PlanTabajo $planTabajo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlanTabajo  $planTabajo
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanTabajo $planTabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlanTabajo  $planTabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanTabajo $planTabajo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlanTabajo  $planTabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanTabajo $planTabajo)
    {
        //
    }
}
