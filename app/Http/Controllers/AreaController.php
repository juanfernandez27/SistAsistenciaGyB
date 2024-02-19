<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('areas.index',['areas'=>$areas]);
    }
    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        //$area = request()->all();
        //return response()->json($area);
        $request->validate([
            'nombre_area'=>'required',
        ]);
        $area = new Area();
        $area->nombre_area = $request->nombre_area;
        $area->descripcion = $request->descripcion;
        $area->estado = '1';
        $area->save();
        return redirect()->route('areas.index')->with('mensaje','Se registró el área de la manera correcta');
    }

    public function show($id)
    {
        $area = Area::findOrFail($id);
        return view('areas.show',['area'=>$area]);
    }

    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('areas.edit',['area'=>$area]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_area'=>'required',
        ]);

        $area = Area::find($id);
        $area->nombre_area=$request->nombre_area;
        $area->descripcion=$request->descripcion;
        $area->save();
        return redirect()->route('areas.index')->with('mensaje','Se actualizó el área de la manera correcta');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Area::destroy($id);
        return redirect()->route('areas.index')->with('mensaje','Se eliminó el área de la manera correcta');
    }
}
