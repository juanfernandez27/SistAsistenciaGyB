@extends('layouts.admin')

@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Listado de Áreas</h1>

        @if($message = Session::get('mensaje'))
            <script>
                Swal.fire({
                    title: "Exitoso!",
                    text: "{{$message}}",
                    icon: "success"
                });
            </script>
        @endif


        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Áreas Registradas</b></h3>
                        <div class="card-tools">
                            <a href="{{url('/areas/create')}}" class="btn btn-primary">
                                <i class="bi bi-person-fill-add"></i> agregar nueva área
                            </a>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">

                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre del Área</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $contador = 0;?>
                            @foreach($areas as $area)
                                <tr>
                                    <td><?php echo $contador = $contador+1;?></td>
                                    <td>{{$area->nombre_area}}</td>
                                    <td>{!!$area->descripcion!!}</td>
                                    <td style="text-align: center">
                                        <button class="btn btn-success btn-sm" style="border-radius: 20px">Activo</button>
                                    </td>

                                    <td style="text-align: center;">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{url('areas',$area->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                            <a href="{{route('areas.edit',$area->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <form action="{{url('areas',$area->id)}}" method="post">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button onclick="return confirm('¿Esta seguro de eliminar este registro?')" type="submit" class="btn btn-danger">
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Áreas",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Areas",
                                        "infoFiltered": "(Filtrado de _MAX_ total Áreas)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Áreas",
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



