<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mediacion;
use App\Expediente;
use App\TipoCierre;
use App\Estado;
use App\Honorario;

class MediacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mediaciones = Mediacion::orderBy('numero')->get();

        return view('mediaciones.index')->withMediaciones($mediaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expedientes = Expediente::orderBy('numero')
                        ->whereDoesntHave('mediacion')
                        ->get();
        $cierres = TipoCierre::orderBy('tipo_cierre')->get();
        $estados = Estado::orderBy('estado')->get();

        return view('mediaciones.create')
                    ->withExpedientes($expedientes)
                    ->withCierres($cierres)
                    ->withEstados($estados);
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
             'numero' => 'required|string',
             'estado_id' => 'required|integer',
             'tipo_cierre_id' => 'required|integer',
             'observaciones' => 'required|string',
             'expediente_id' => 'required|integer',
             'fecha' => 'required|date'
        ]);

        $mediacion = new Mediacion();

        $mediacion->numero = $request->numero;
        $mediacion->estado_id = $request->estado_id;
        $mediacion->tipo_cierre_id = $request->tipo_cierre_id;
        $mediacion->observaciones = $request->observaciones;
        $mediacion->expediente_id = $request->expediente_id;
        $mediacion->fecha = $request->fecha;

        if($mediacion->save()) {
            return redirect(route('mediaciones.index'));
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
        $expedientes = Expediente::orderBy('numero')->get();
        $mediacion = Mediacion::findOrFail($id);
        $cierres = TipoCierre::orderBy('tipo_cierre')->get();
        $estados = Estado::orderBy('estado')->get();

        if (isset($mediacion)) {
            return view('mediaciones.edit')
                    ->withExpedientes($expedientes)
                    ->withMediacion($mediacion)
                    ->withCierres($cierres)
                    ->withEstados($estados);
        }
        return response('error, mediacion no encontrada', 500);
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
            'numero' => 'required|string',
             'estado_id' => 'required|integer',
             'tipo_cierre_id' => 'required|integer',
             'observaciones' => 'required|string',
             'expediente_id' => 'required|integer',
             'fecha' => 'required|date'
        ]);

       $mediacion = Mediacion::findOrFail($id);

        if (isset($mediacion)) {
            $mediacion->numero = $request->numero;
            $mediacion->estado_id = $request->estado_id;
            $mediacion->tipo_cierre_id = $request->tipo_cierre_id;
            $mediacion->observaciones = $request->observaciones;
            $mediacion->expediente_id = $request->expediente_id;
            $mediacion->fecha = $request->fecha;

            if($mediacion->save()) {
                return redirect(route('mediaciones.index'));
            } else {
                return back();
            }
        }
        return response('error, mediacion no encontrada', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mediacion = Mediacion::findOrFail($id);

        $mediacion->delete();

        return redirect(route('mediaciones.index'));

    }

    public function verAsignarHonorarios($id)
    {
        $mediacion = Mediacion::with('expediente')
                               ->find($id);
        if ($mediacion->honorario()->exists()) {
            return view('mediaciones.verHonorario')
                        ->withMediacion($mediacion);
        }
        return view('mediaciones.asignarHonorario')
                    ->withMediacion($mediacion);


    }

    public function asignarHonorarios(Request $request, $id)
    {
        $this->validate($request, [
            'benecificio_actor' => 'boolean',
            'benecificio_demandado' => 'boolean',
            'monto_actor' => 'required|numeric',
            'monto_demandado' => 'required|numeric',
            'fecha_pago_actor' => 'required|date',
            'fecha_pago_demandado' => 'required|date',
        ]);

        $mediacion = Mediacion::with('honorario')->find($id);
        if (!$mediacion->honorario()->exists()) {
            $honorario = Honorario::create([
                'benecificio_actor' => $request->beneficio_actor ? true:false,
                'benecificio_demandado' => $request->beneficio_demandado ? true:false,
                'monto_actor' => $request->monto_actor,
                'monto_demandado' => $request->monto_demandado,
                'fecha_pago_actor' => $request->fecha_pago_actor,
                'fecha_pago_demandado' => $request->fecha_pago_demandado,
                'mediacion_id' => $id
            ]);
        }
        return redirect(route('mediaciones.index'));

    }

    public function listarHonorarios()
    {

    }
}
