

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de asistencias</title>
</head>
<body>
<br>
<h1>Reporte de asistencias</h1>

<table id="example1" class="table table-bordered table-striped table-sm" border="1">
    <thead class="thead">
    <tr>
        <th>No</th>

        <th>Fecha Asistencia</th>
        <th>Nombres y apellidos</th>

    </tr>
    </thead>
    <tbody>
    <?php $contador_de_asistencia = 1;?>
    @foreach ($asistencias as $asistencia)
        <tr>
            <td><?=$contador_de_asistencia++; ?></td>

            <td>{{ $asistencia->fecha_asistencia }}</td>
            <td>{{ $asistencia->trabajador->nombre_apellido }}</td>

        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
