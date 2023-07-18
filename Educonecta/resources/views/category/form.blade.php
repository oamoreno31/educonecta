<div class="card-body">
    <div class="form-group">
        {{ Form::label('name', __('Nombre')) }}
        {{ Form::text('name', $category->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('Nombre')]) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::text('slug', $category->slug, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'placeholder' => __('Slug'), 'hidden' => true]) }}
        {!! $errors->first('slug', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-secondary">{{ __('Enviar') }}</button>
</div>
