<?php

namespace App\Http\Controllers;

use App\Mediacion;
use App\Persona;
use Illuminate\Auth\Request;


use App\ManejoDeFondo;
use App\ManejoCuota;
use App\ManejoEstado;
use App\ManejoForma;


class ManejoDeFondoController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manejoDeFondos = ManejoDeFondo::orderBy('fechas')->get();

        return view('manejoDeFondos.index')->withManejoDeFondos($manejoDeFondos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = Persona::orderBy('apellido')->get();
        $mediaciones = Mediacion::orderBy('numero')->get();

        return view('manejoDeFondos.create')
                    ->withPersonas($personas)
                    ->withMediaciones($mediaciones);

    }
   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
             'apellido' => 'required|string',
             'monto'=>'required|integer',
             'numero' => 'required|string',
             'manejo_forma_id' => 'required|string',
             'manejo_cuota_id' => 'required|integer',
             'manejo_estado_id' => 'required|string',
             'fecha' => 'required|date'
        ]);

        $manejoDeFondo = new manejoDeFondo();

        $manejoDeFondo->apellido = $request->apellido;
        $manejoDeFondo->monto = $request->monto;
        $manejoDeFondo->numero = $request->numero;
        $manejoDeFondo->manejo_forma_id = $request->manejo_forma_id;
        $manejoDeFondo->manejo_cuota_id = $request->manejo_cuota_id;;
        $manejoDeFondo->manejo_estado_id = $request->manejo_estado_id;
        $manejoDeFondo->fecha = $request->fecha;

        if($manejoDeFondo->save()) {
            return redirect(route('manejoDeFondos.index'));
        } else {
            return back();
        }
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
        $manejoDeFondo = ManejoDeFondo::findOrFail($id);
        $manejoDeFondo = ManejoDeFondo::orderBy('monto')->get();
        $manejoDeFondo = ManejoDeFondo::orderBy('fecha')->get();
        $manejoCuotas = ManejoCuota::orderBy('manejo_cuota');
        $manejoEstados = ManejoEstado::orderBy('manejo_estado');

        if (isset($manejoDeFondo)) {
            return view('manejoDeFondos.edit')
                    ->withManejoDeFondo($manejoDeFondo)
                    ->withManejoCuota($manejoCuotas)
                    ->withManejoEstado($manejoEstados);
        }
        return response('error, manejo de fondo no encontrada', 500);
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
        $this->validate($request, [
            'apellido' => 'required|string',
            'monto'=>'required|integer',
            'numero' => 'required|string',
            'manejo_forma_id' => 'required|string',
            'manejo_cuota_id' => 'required|integer',
            'manejo_estado_id' => 'required|string',
            'fecha' => 'required|date'
        ]);

       $manejoDeFondos = ManejoDeFondo::findOrFail($id);

        if (isset($manejoDeFondo)) {
            $manejoDeFondo->apellido = $request->apellido;
            $manejoDeFondo->monto = $request->monto;
            $manejoDeFondo->numero = $request->numero;
            $manejoDeFondo->manejo_forma_id = $request->manejo_forma_id;
            $manejoDeFondo->manejo_cuota_id = $request->manejo_cuota_id;;
            $manejoDeFondo->manejo_estado_id = $request->manejo_estado_id;
            $manejoDeFondo->fecha = $request->fecha;

            if($manejoDeFondo->save()) {
                return redirect(route('manejoDeFondos.index'));
            } else {
                return back();
            }
        }
        return response('error, manejo de fondo no encontrada', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manejoDeFondo = ManejoDeFondo::findOrFail($id);

        $manejoDeFondo->delete();

        return redirect(route('manejoDeFondos.index'));

    }


}
