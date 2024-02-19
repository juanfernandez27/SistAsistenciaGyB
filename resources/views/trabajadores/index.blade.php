@extends('layouts.admin')

@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Listado de Trabajadores</h1>
        @if($message = Session::get('mensaje'))
            <script>
                Swal.fire({
                    title: "Genial!",
                    text: "{{$message}}",
                    icon: "success"
                });
            </script>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Trabajadores Registrados</b></h3>
                        <div class="card-tools">
                            <a href="{{url('/trabajadores/create')}}" class="btn btn-primary">
                                <i class="bi bi-person-fill-add"></i> agregar nuevo Trabajador
                            </a>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">

                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombres y Apellidos</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th>Agregado</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $contador = 0;?>
                            @foreach($trabajadores as $trabajador)
                                <tr>
                                    <td><?php echo $contador = $contador+1;?></td>
                                    <td>{{$trabajador->nombre_apellido}}</td>
                                    <td>{{$trabajador->telefono}}</td>
                                    <td>{{$trabajador->email}}</td>
                                    <td style="text-align: center">
                                        <button class="btn btn-success btn-sm" style="border-radius: 20px">Activo</button>

                                    </td>
                                    <td>{{$trabajador->fecha_ingreso}}</td>

                                    <td style="text-align: center;">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{url('trabajadores',$trabajador->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                            <a href="{{route('trabajadores.edit',$trabajador->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <form action="{{url('trabajadores',$trabajador->id)}}" method="post">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" onclick="return confirm('¿Esta seguro de eliminar este registro?')" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                            </form>
                                        </div>
                                    </td>

                                </tr>

                            @endforeach
                            </tbody>

                        </table>

                        <script>
                            $(function () {
                                $("#example1").DataTable({
                                    "pageLength": 10,
                                    "language": {
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Trabajadores",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Trabajadores",
                                        "infoFiltered": "(Filtrado de _MAX_ total Trabajadores)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Trabajadores",
                                        "loadingRecords": "Cargando...",
                                        "processing": "Procesando...",
                                        "search": "Buscador:",
                                        "zeroRecords": "Sin resultados encontrados",
                                        "paginate": {
                                            "first": "Primero",
                                            "last": "Ultimo",
                                            "next": "Siguiente",
                                            "previous": "Anterior"
                                        }
                                    },
                                    /* fin de idiomas */

                                    "responsive": true, "lengthChange": true, "autoWidth": false,

                                    buttons: [{
                                        extend: 'collection',
                                        text: 'Reportes',
                                        orientation: 'landscape',
                                        buttons: [{
                                            text: 'Copiar',
                                            extend: 'copy',
                                        }, {
                                            extend: 'pdf'
                                        }, {
                                            extend: 'csv'
                                        }, {
                                            extend: 'excel'
                                        }, {
                                            text: 'Imprimir',
                                            extend: 'print'
                                        }
                                        ]
                                    },
                                        {
                                            extend: 'colvis',
                                            text: 'Visor de columnas',
                                            collectionLayout: 'fixed three-column'
                                        }
                                    ],
                                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                            });
                        </script>
                    </div>

                </div>

            </div>
        </div>



    </div>
@endsection


