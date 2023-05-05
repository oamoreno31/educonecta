<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::text('posts_id', $post->id, ['class' => 'form-control' . ($errors->has('posts_id') ? ' is-invalid' : ''), 'placeholder' => 'Posts Id', 'hidden' => 'true']) }}
            {!! $errors->first('posts_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::text('users_id', Auth::user()->id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id', 'hidden' => 'true']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::text('comments_id', $comment->comments_id, ['class' => 'form-control comments_id' . ($errors->has('comments_id') ? ' is-invalid' : ''), 'placeholder' => 'Comments Id', 'hidden' => 'true']) }}
            {!! $errors->first('comments_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Contenido') }}
            {{ Form::textarea('content', $comment->content, ['class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Contenido', 'row' => '6']) }}
            {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::text('state', true, ['class' => 'form-control' . ($errors->has('state') ? ' is-invalid' : ''), 'placeholder' => 'State', 'hidden' => 'true']) }}
            {!! $errors->first('state', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
