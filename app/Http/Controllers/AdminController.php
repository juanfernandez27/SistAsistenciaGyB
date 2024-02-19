<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Trabajador;
use App\Models\User;
use App\Models\Asistencia;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $areas = Area::all();
        $trabajadores = Trabajador::all();
        $usuarios = User::all();
        $asistencias = Asistencia::all();

        return view('index',['areas'=>$areas,
                                    'trabajadores'=>$trabajadores,
                                    'usuarios'=>$usuarios,
                                    'asistencias'=>$asistencias,
                                    ]);
    }
}
