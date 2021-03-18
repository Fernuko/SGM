<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Abogado;

class AbogadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abogados = Abogado::orderBy('apellido')->get();

        return view('abogados.index')->withAbogados($abogados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abogados.create');
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
            'domicilio' => 'required|string',
            'telefono' => 'required|string',
            'matricula' => 'required|integer',
            'email' => 'required|email'

        ]);

        $abogado = new Abogado();

        $abogado->apellido = $request->apellido;
        $abogado->nombre = $request->nombre;
        $abogado->domicilio = $request->domicilio;
        $abogado->telefono = $request->telefono;
        $abogado->matricula = $request->matricula;
        $abogado->email = $request->email;


        if($abogado->save()) {
            return redirect(route('abogados.index'));
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
        $abogado = Abogado::findOrFail($id);

        if (isset($abogado)) {
            return view('abogados.edit')->withAbogado($abogado);
        }
        return response('error, abogado no encontrada', 500);
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
        //dd($request);
        $this->validate($request, [
            'apellido' => 'required|string',
            'nombre' => 'required|string',
            'domicilio' => 'required|string',
            'telefono' => 'required|string',
            'matricula' => 'required|integer',
            'email' => 'required|email',

        ]);

        $abogado = Abogado::findOrFail($id);

        if (isset($abogado)) {

            $abogado->apellido = $request->apellido;
            $abogado->nombre = $request->nombre;
            $abogado->domicilio = $request->domicilio;
            $abogado->telefono = $request->telefono;
            $abogado->matricula = $request->matricula;
            $abogado->email = $request->email;


            if($abogado->save()) {
                return redirect(route('abogados.index'));
            } else {
                return back();
            }
        }

        return response('error, abogados no encontrada', 500);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abogado = Abogado::findOrFail($id);

        $abogado->delete();

        return redirect(route('abogados.index'));
    }
}
