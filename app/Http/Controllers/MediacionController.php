<?php

namespace App\Http\Controllers;

use App\Estado;

use App\Honorario;
use App\Mediacion;
use Carbon\Carbon;
use App\Expediente;
use App\TipoCierre;
use Illuminate\Http\Request;
use App\Exports\HonorariosExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\MediacionResource;
use App\Http\Resources\MediacionCollection;

class MediacionController extends Controller
{

    public function __construct(Mediacion $mediacion)
    {
        $this->mediacion = $mediacion;
    }

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
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mediacion = Mediacion::with('tipoCierre')->find($id);
        //$med = new MediacionResource($mediacion);
        /*$med = [
            'id' => $mediacion->id,
            'observaciones' => $mediacion->observaciones,
            'estado' => $mediacion->estado->estado,
            'actor' => $mediacion->
            'tipoCierre' => $mediacion->tipoCierre->tipo_cierre,
        ];*/
        //dd($med);
        // return view('mediaciones.show')
        //     ->with(['mediacion' => $med]);
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

    public function exportarHonorarios()
    {
        $data = $this->getMediaciones();
        //dd($mediaciones);

        return Excel::download(new HonorariosExport($data), 'honorarios_de_mediaciones_fecha_'.now().'.xlsx');

    }

    private function getMediaciones()
    {
        $mediaciones = Mediacion::orderBy('numero')
                        ->with(['expediente',
                                'expediente.actor',
                                'expediente.demandado',
                                'expediente.abogado_actor',
                                'expediente.abogado_demandado',
                                'expediente.juzgado',
                                'estado',
                                'tipoCierre',
                                'honorario'
                                ])
                        ->get();

        $data = [];

        foreach ($mediaciones as $mediacion) {
            $honorarios_acordados = $mediacion->honorario()->exists() ? true:false;
            $data[] = [
                'numero'  => $mediacion->numero,
                'observaciones' => $mediacion->observaciones,
                'juzgado' => $mediacion->expediente->juzgado->nombre,
                'estado' => $mediacion->estado->estado,
                'actor' => $mediacion->expediente->actor->getApyNom(),
                'dni_actor' => $mediacion->expediente->actor->dni,
                'aborgado_actor' => $mediacion->expediente->abogado_actor->getApyNom(),
                'honorarios_actor' => $honorarios_acordados ? '$ '.strval($mediacion->honorario->monto_actor):'NO ACORDADOS',
                'fecha_de_pago_actor' => $honorarios_acordados ? Carbon::parse($mediacion->honorario->fecha_pago_actor)->format('d/m/Y'):'- - -',
                'demandado' => $mediacion->expediente->demandado->getApyNom(),
                'dni_demandado' => $mediacion->expediente->demandado->dni,
                'aborgado_demandado' => $mediacion->expediente->abogado_demandado->getApyNom(),
                'honorarios_demandado' => $honorarios_acordados ? '$ '.strval($mediacion->honorario->monto_demandado):'- - -',
                'fecha_de_pago_demandado' => $honorarios_acordados ? Carbon::parse($mediacion->honorario->fecha_pago_demandado)->format('d/m/Y'):'- - -',
                'honorarios_subtotal' => $honorarios_acordados ? '$ '.strval($mediacion->honorario->monto_actor + $mediacion->honorario->monto_demandado):'- - -',
            ];
        }

        return $data;
    }
}
