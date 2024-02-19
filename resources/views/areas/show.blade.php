@extends('layouts.admin')

@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Area: {{$area->nombre_area}} </h1><br>

        <div class="row">
            <div class="col-md-11">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Datos registrados</b></h3>
                    </div>

                    <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">Nombre del área</label>
                                                <input type="text" name="nombre_area" value="{{$area->nombre_area}}" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Descripción</label>
                                                <p>{!!$area->descripcion!!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <a href="{{url('/areas')}}"class="btn btn-secondary">Volver</a>
                                    </div>
                                </div>
                            </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
