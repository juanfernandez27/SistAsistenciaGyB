@extends('layouts.admin')

@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Creación de una Nueva Área</h1><br>

        @foreach($errors->all as $error)
            <div class="alert alert-danger">
                <li>{{$error}}</li>
            </div>
        @endforeach

        <div class="row">
            <div class="col-md-11">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Llene los datos</b></h3>
                    </div>

                    <div class="card-body" style="display: block;">
                        <form action="{{url('/areas')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">Nombre del área</label><b>*</b>
                                                <input type="text" name="nombre_area" value="{{old('nombre_area')}}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Descripción</label><b>*</b>
                                                <textarea class="form-control" name="descripcion" id="" cols="30" rows="10"></textarea>
                                                <script>
                                                    CKEDITOR.replace( 'descripcion' );
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <a href=""class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Guardar registro</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
