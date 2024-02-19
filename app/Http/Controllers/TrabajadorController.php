<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
{
    public function index(){
        $trabajadores = Trabajador::all()->sortByDesc('id');
        return view('trabajadores.index',['trabajadores'=>$trabajadores]);
    }
    public function create(){
        return view('trabajadores.create');
    }

    public function store(Request $request){
        //$trabajador = request()->all();
        //return response()->json($trabajador);

        $request->validate([
            'nombre_apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'fecha_nacimiento' => 'required',
            'email' => 'required',
            'area' => 'required',
        ]);

        $trabajador = new Trabajador();
        $trabajador->nombre_apellido = $request->nombre_apellido;
        $trabajador->direccion = $request->direccion;
        $trabajador->telefono = $request->telefono;
        $trabajador->fecha_nacimiento = $request->fecha_nacimiento;
        $trabajador->genero = $request->genero;
        $trabajador->email = $request->email;
        $trabajador->estado = '1';
        $trabajador->area = $request->area;
        //$trabajador->fotografia = $request->fotografia;

        if($request->hasFile('fotografia')){
            $trabajador->fotografia =$request->file('fotografia')->store('fotografias_trabajadores','public');
        }
        $trabajador->fecha_ingreso =date($format = 'Y-m-d');

        $trabajador->save();

        return redirect()->route('trabajadores.index')->with('mensaje','Se registro al miembro de la manera correcta');

    }
    public function show($id){
        $trabajador = Trabajador::findOrFail($id);
        //return response()->json($trabajador);
        return view('trabajadores.show',['trabajador'=>$trabajador]);
    }

    public function edit($id){
        $trabajador = Trabajador::findOrFail($id);
        return view('trabajadores.edit',['trabajador'=>$trabajador]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre_apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'fecha_nacimiento' => 'required',
            'email' => 'required',
            'area' => 'required',
        ]);
        $trabajador = Trabajador::find($id);

        $trabajador->nombre_apellido = $request->nombre_apellido;
        $trabajador->direccion = $request->direccion;
        $trabajador->telefono = $request->telefono;
        $trabajador->fecha_nacimiento = $request->fecha_nacimiento;
        $trabajador->genero = $request->genero;
        $trabajador->email = $request->email;
        $trabajador->area = $request->area;

        //primero elimina la fotografia anterior y luego subes otra fotografia
        if($request->hasFile('fotografia')){
            Storage::delete('public/'.$trabajador->fotografia);
            $trabajador->fotografia =$request->file('fotografia')->store('fotografias_trabajadores','public');
        }
        $trabajador->save();
        return redirect()->route('trabajadores.index')->with('mensaje','Se actualizó al miembro de la manera correcta');
    }

    public function destroy($id){
        $trabajador = Trabajador::find($id);
        Storage::delete('public/'.$trabajador->fotografia);
        Trabajador::destroy($id);
        return redirect()->route('trabajadores.index')->with('mensaje','Se eliminó al miembro de la manera correcta');
    }
}
