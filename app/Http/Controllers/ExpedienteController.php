<?php

namespace App\Http\Controllers;

use App\Abogado;
use Illuminate\Http\Request;

use App\Expediente;
use App\Persona;
use App\Juzgado;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expedientes = Expediente::orderBy('caratula')->get();

        return view('expedientes.index')->withExpedientes($expedientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = Persona::orderBy('apellido')->get();
        $abogados = Abogado::orderBy('apellido')->get();
        $juzgados = Juzgado::orderBy('nombre')->get();
        return view('expedientes.create')
                    ->withPersonas($personas)
                    ->withAbogados($abogados)
                    ->withJuzgados($juzgados);
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
             'caratula' => 'required|string',
             'numero' => 'required|integer',
             'actor_id' => 'required|integer',
             'demandado_id' => 'required|integer|different:actor_id',
             'abogado_actor_id' => 'required|integer',
             'abogado_demandado_id' => 'required|integer|different:abogado_actor_id',
             'juzgado_id' => 'required|integer'
         ]);

        $expediente = new Expediente();

        $expediente->caratula = $request->caratula;
        $expediente->numero = $request->numero;
        $expediente->actor_id = $request->actor_id;
        $expediente->demandado_id = $request->demandado_id;
        $expediente->abogado_actor_id = $request->abogado_actor_id;
        $expediente->abogado_demandado_id = $request->abogado_demandado_id;
        $expediente->juzgado_id = $request->juzgado_id;


        if($expediente->save()) {
            return redirect(route('expedientes.index'));
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
        $expediente = Expediente::findOrFail($id);
        $personas = Persona::orderBy('apellido')->get();
        $abogados = Abogado::orderBy('apellido')->get();
        $juzgados = Juzgado::orderBy('nombre')->get();

        if (isset($expediente)) {
            return view('expedientes.edit')
                ->withPersonas($personas)
                ->withAbogados($abogados)
                ->withJuzgados($juzgados)
                ->withExpediente($expediente);
        }
        return response('error, expediente no encontrada', 500);
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
            'caratula' => 'required|string',
            'numero' => 'required|integer',
            'actor_id' => 'required|integer',
            'demandado_id' => 'required|integer|different:actor_id',
            'abogado_actor_id' => 'required|integer',
            'abogado_demandado_id' => 'required|integer|different:abogado_actor_id',
            'juzgado_id' => 'required|integer'
        ]);

       $expediente = Expediente::findOrFail($id);

       if (isset($expediente)) {
            $expediente->caratula = $request->caratula;
            $expediente->numero = $request->numero;
            $expediente->actor_id = $request->actor_id;
            $expediente->demandado_id = $request->demandado_id;
            $expediente->abogado_actor_id = $request->abogado_actor_id;
            $expediente->abogado_demandado_id = $request->abogado_demandado_id;
            $expediente->juzgado_id = $request->juzgado_id;


            if($expediente->save()) {
                return redirect(route('expedientes.index'));
            } else {
                return back();
            }
       }

       return response('error, expediente no encontrado', 500);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expediente = Expediente::findOrFail($id);

        $expediente->delete();

        return redirect(route('expedientes.index'));
    }
}
