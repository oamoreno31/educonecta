<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('posts_id') }}
            {{ Form::text('posts_id', $postsCategory->posts_id, ['class' => 'form-control' . ($errors->has('posts_id') ? ' is-invalid' : ''), 'placeholder' => 'Posts Id']) }}
            {!! $errors->first('posts_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categories_id') }}
            {{ Form::text('categories_id', $postsCategory->categories_id, ['class' => 'form-control' . ($errors->has('categories_id') ? ' is-invalid' : ''), 'placeholder' => 'Categories Id']) }}
            {!! $errors->first('categories_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>