<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('fecha_asistencia') }}
            {{ Form::date('fecha_asistencia', $asistencia->fecha_asistencia, ['class' => 'form-control' . ($errors->has('fecha_asistencia') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Asistencia']) }}
            {!! $errors->first('fecha_asistencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Trabajadores') }}
            {{ Form::select('trabajador_id',$trabajadores, $asistencia->trabajador_id, ['class' => 'form-control' . ($errors->has('trabajador_id') ? ' is-invalid' : ''), 'placeholder' => 'Buscar trabajador']) }}
            {!! $errors->first('trabajador_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar asistencia</button>
    </div>
</div>
