@extends('layouts.admin')

@section('content')
    <div class="content" style="margin: 20px">
        <h1>Página Principal</h1>
        <br>
        <div class="row">
            <div class="col-lg-3">

                <div class="small-box bg-info" style="height: 160px">
                    <div class="inner">
                        <?php $contador_area =0; ?>
                        @foreach($areas as $area)
                                <?php $contador_area =$contador_area +1; ?>
                        @endforeach
                        <h3><?=$contador_area?></h3>
                        <p>Áreas</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-building-check"></i>
                    </div>
                    <a href="{{url('areas')}}" class="small-box-footer" style="margin-top: 15px">Más información<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="small-box bg-success" style="height: 160px">
                    <div class="inner">
                        <?php $contador_trabajadores =0; ?>
                        @foreach($trabajadores as $trabajador)
                                <?php $contador_trabajadores =$contador_trabajadores +1; ?>
                        @endforeach
                        <h3><?=$contador_trabajadores?></h3>
                        <p>Trabajadores</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-file-person"></i>
                    </div>
                    <a href="{{url('trabajadores')}}" class="small-box-footer" style="margin-top: 15px">Más información<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="small-box bg-warning" style="height: 160px">
                    <div class="inner">
                        <?php $contador_usuarios =0; ?>
                        @foreach($usuarios as $usuario)
                                <?php $contador_usuarios =$contador_usuarios +1; ?>
                        @endforeach
                        <h3><?=$contador_usuarios?></h3>
                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-person-video2"></i>
                    </div>
                    <a href="{{url('usuarios')}}" class="small-box-footer" style="margin-top: 15px">Más información<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="small-box bg-primary" style="height: 160px">
                    <div class="inner">
                        <?php $contador_asistencias =0; ?>
                        @foreach($asistencias as $asistencia)
                                <?php $contador_asistencias =$contador_asistencias +1; ?>
                        @endforeach
                        <h3><?=$contador_asistencias?></h3>
                        <p>Asistencias</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-calendar3"></i>
                    </div>
                    <a href="{{url('asistencias')}}" class="small-box-footer" style="margin-top: 15px">Más información<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
