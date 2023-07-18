<div class="card-body">
    <div class="form-group">
        {{ Form::label('Nombre') }}
        {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group mt-2">
        {{ Form::label('Email') }}
        {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group mt-2">
        {{ Form::label('documentType', 'Tipo de Documento', ['class' => 'form-label']) }}
        {{ Form::select('documentType', [
            '' => '-- Seleccione una Opción --',
            'CC' => 'Cédula de Ciudadanía',
            'TI' => 'Tarjeta de Identidad',
            'TE' => 'Tarjeta de Extranjería',
            'Otro' => 'Otro'
        ], $user->documentType, ['class' => 'form-select' . ($errors->has('documentType') ? ' is-invalid' : ''), 'id' => 'documentType', 'aria-label' => 'Selecciona una opción']) }}
        {!! $errors->first('documentType', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group mt-2">
        {{ Form::label('Número de documento') }}
        {{ Form::text('documentId', $user->documentId, ['class' => 'form-control' . ($errors->has('documentId') ? ' is-invalid' : ''), 'placeholder' => 'Número de documento']) }}
        {!! $errors->first('documentId', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-secondary">{{ __('Enviar') }}</button>
</div>
