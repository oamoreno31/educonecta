<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('posts_id') }}
            {{ Form::text('posts_id', $comment->posts_id, ['class' => 'form-control' . ($errors->has('posts_id') ? ' is-invalid' : ''), 'placeholder' => 'Posts Id']) }}
            {!! $errors->first('posts_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('users_id') }}
            {{ Form::text('users_id', $comment->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comments_id') }}
            {{ Form::text('comments_id', $comment->comments_id, ['class' => 'form-control' . ($errors->has('comments_id') ? ' is-invalid' : ''), 'placeholder' => 'Comments Id']) }}
            {!! $errors->first('comments_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('content') }}
            {{ Form::text('content', $comment->content, ['class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Content']) }}
            {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('state') }}
            {{ Form::text('state', $comment->state, ['class' => 'form-control' . ($errors->has('state') ? ' is-invalid' : ''), 'placeholder' => 'State']) }}
            {!! $errors->first('state', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>