<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Trabajador;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class AsistenciaController extends Controller
{

    public function index()
    {
        $asistencias = Asistencia::paginate();

        return view('asistencia.index', compact('asistencias'))
            ->with('i', (request()->input('page', 1) - 1) * $asistencias->perPage());
    }
    public function reportes()
    {
        return view('asistencia.reportes');
    }
    public function pdf()
    {
        $asistencias = Asistencia::paginate();
        $pdf = Pdf::loadView('asistencia.pdf',['asistencias'=>$asistencias]);
        return $pdf->stream();

    }
    public function pdf_fechas(Request $request)
    {
        $fi = $request->fi;
        $ff = $request->ff;
        $asistencias = Asistencia::where('fecha_asistencia','>=',$fi)
        ->where('fecha_asistencia','<=',$ff)
        ->get();

        $pdf = Pdf::loadView('asistencia.pdf_fechas',['asistencias'=>$asistencias]);
        return $pdf->stream();
        //return view('asistencia.pdf_fechas',['asistencias'=>$asistencias]);

    }

    public function create()
    {
        $asistencia = new Asistencia();
        $trabajadores = Trabajador::pluck('nombre_apellido','id');
        return view('asistencia.create', compact('asistencia','trabajadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Asistencia::$rules);

        $asistencia = Asistencia::create($request->all());

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asistencia = Asistencia::find($id);

        return view('asistencia.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asistencia = Asistencia::find($id);
        $trabajadores = Trabajador::pluck('nombre_apellido','id');

        return view('asistencia.edit', compact('asistencia','trabajadores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        request()->validate(Asistencia::$rules);

        $asistencia->update($request->all());

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::find($id)->delete();

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia deleted successfully');
    }
}
