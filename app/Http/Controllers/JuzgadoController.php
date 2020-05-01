<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Juzgado;

class JuzgadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juzgados = Juzgado::orderBy('nombre')->get();

        return view('juzgados.index')->withJuzgados($juzgados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('juzgados.create');
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
            'nombre' => 'required|string',
            'telefono' => 'required|string',
        ]);

        $juzgado = new Juzgado();

        $juzgado->nombre = $request->nombre;
        $juzgado->telefono = $request->telefono;


        if($juzgado->save()) {
            return redirect(route('juzgados.index'));
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
        $juzgado = Juzgado::findOrFail($id);

        if (isset($juzgado)) {
            return view('juzgados.edit')->withJuzgado($juzgado);
        }
        return response('error, juzgado no encontrado', 500);
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
         //dd($request->all());
         $this->validate($request, [
            'nombre' => 'required|string',
            'telefono' => 'required|string',
        ]);

        $juzgado = Juzgado::findOrFail($id);

        if (isset($juzgado)) {
            $juzgado->nombre = $request->nombre;
            $juzgado->telefono = $request->telefono;


            if($juzgado->save()) {
                return redirect(route('juzgados.index'));
            } else {
                return back();
            }
        }
        return response('error, juzgado no encontrado', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $juzgado = Juzgado::findOrFail($id);

        $juzgado->delete();

        return redirect(route('Juzgados.index'));
    }
}
