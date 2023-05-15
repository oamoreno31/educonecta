<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('posts_id') }}
            {{ Form::text('posts_id', $postsTag->posts_id, ['class' => 'form-control' . ($errors->has('posts_id') ? ' is-invalid' : ''), 'placeholder' => 'Posts Id']) }}
            {!! $errors->first('posts_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tags_id') }}
            {{ Form::text('tags_id', $postsTag->tags_id, ['class' => 'form-control' . ($errors->has('tags_id') ? ' is-invalid' : ''), 'placeholder' => 'Tags Id']) }}
            {!! $errors->first('tags_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>