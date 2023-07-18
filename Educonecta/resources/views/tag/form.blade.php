<div class="card-body">
    <div class="form-group">
        {{ Form::label('Nombre') }}
        {{ Form::text('name', $tag->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::text('slug', $tag->slug, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'placeholder' => 'Slug', "hidden" => "true"]) }}
        {!! $errors->first('slug', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-secondary">{{ __('Enviar') }}</button>
</div>
