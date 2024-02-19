@extends('layouts.admin')

@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Datos del trabajador registrado</h1><br>

        <div class="row">
            <div class="col-md-11">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Datos registrados</b></h3>
                    </div>

                    <div class="card-body" style="display: block;">

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Nombres y Apellidos</label>
                                                <input type="text" name="nombre_apellido" value="{{$trabajador->nombre_apellido}}" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" value="{{$trabajador->email}}" class="form-control" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Teléfono</label>
                                                <input type="number" name="telefono" value="{{$trabajador->telefono}}" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Fecha de Nacimiento</label>
                                                <input type="date" name="fecha_nacimiento" value="{{$trabajador->fecha_nacimiento}}" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Género</label>
                                                <select name="genero" class="form-control" id="" disabled>
                                                    @if($trabajador->genero == 'MASCULINO')
                                                        <option value="MASCULINO">MASCULINO</option>
                                                        <option value="FEMENINO">FEMENINO</option>
                                                    @else
                                                        <option value="FEMENINO">FEMENINO</option>
                                                        <option value="MASCULINO">MASCULINO</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Area</label>
                                                <input type="text" name="area" value="{{$trabajador->area}}" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Direccion</label>
                                                <input type="text" name="direccion" value="{{$trabajador->direccion}}" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fotografia </label><br>
                                        @if($trabajador->fotografia == '')
                                            @if($trabajador->genero == 'MASCULINO')
                                                <center><img src="{{url('images/avatar-hombre.jpg')}}" width="150px" alt=""></center>
                                            @else
                                                <center><img src="{{url('images/avatar-mujer.jpg')}}" width="150px" alt=""></center>
                                            @endif

                                        @else
                                            <center>
                                                <img src="{{asset('storage').'/'.$trabajador->fotografia}}" width="150px" alt="">
                                            </center>

                                        @endif

                                    </div>
                                </div>
                            </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <a href="{{url('/trabajadores')}}"class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
