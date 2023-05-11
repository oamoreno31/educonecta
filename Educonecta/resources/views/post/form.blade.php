<script src="{{ asset('assets/vendor/tinymce/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

<script> tinymce.init({ selector: '#content' }); </script>
<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $post->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $post->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('content') }}
            {{ Form::textarea('content', $post->content, ['class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Content']) }}
            {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('post_date') }} -->
            {{ Form::text('post_date', date('Y-m-d'), ['class' => 'form-control' . ($errors->has('post_date') ? ' is-invalid' : ''), 'placeholder' => 'Post Date', 'hidden' => 'true']) }}
            {!! $errors->first('post_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('author_id') }} -->
            {{ Form::text('author_id', Auth::user()->id, ['class' => 'form-control' . ($errors->has('author_id') ? ' is-invalid' : ''), 'placeholder' => 'Author Id', 'hidden' => 'true']) }}
            {!! $errors->first('author_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('author_name') }} -->
            {{ Form::text('author_name', Auth::user()->name, ['class' => 'form-control' . ($errors->has('author_name') ? ' is-invalid' : ''), 'placeholder' => 'Author Name', 'hidden' => 'true']) }}
            {!! $errors->first('author_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <!-- {{ Form::label('author_name') }} -->
            {{ Form::text('likes', 0, ['class' => 'form-control' . ($errors->has('likes') ? ' is-invalid' : ''), 'placeholder' => 'likes', 'hidden' => 'true']) }}
            {!! $errors->first('likes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('category_id') }}
            {!! Form::select('category_id', $options, $post->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : '')]) !!}
            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
            <!-- <select id="categories-dropdown" class="form-control"></select> -->
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>