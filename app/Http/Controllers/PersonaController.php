<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::orderBy('nombre')->get();

        return view('personas.index')->withPersonas($personas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'apellido' => 'required|string',
            'nombre' => 'required|string',
            'dni' => 'required|integer',
            'domicilio' => 'required|string',
            'telefono' => 'required|string',

             ]);

        $persona = new Persona();

        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->dni = $request->dni;
        $persona->domicilio = $request->domicilio;
        $persona->telefono = $request->telefono;


        if($persona->save()) {
            return redirect(route('personas.index'));
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
        $persona = Persona::findOrFail($id);

        if (isset($persona)) {
            return view('personas.edit')->withPersona($persona);
        }
        return response('error, persona no encontrada', 500);
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
            'nombre' => 'required|string',
            'dni' => 'required|integer',
            'domicilio' => 'required|string',
            'telefono' => 'required|string',

             ]);

        $persona = Persona::findOrFail($id);

        if (isset($persona)){
            $persona->nombre = $request->nombre;
            $persona->apellido = $request->apellido;
            $persona->dni = $request->dni;
            $persona->domicilio = $request->domicilio;
            $persona->telefono = $request->telefono;


            if($persona->save()) {
                return redirect(route('personas.index'));
            } else {
                return back();
            }
        }
        return response('error, persona no encontrada', 500);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);

        $persona->delete();

        return redirect(route('personas.index'));

    }
}
