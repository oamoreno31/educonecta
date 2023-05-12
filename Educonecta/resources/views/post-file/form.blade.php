<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('post_id') }}
            {{ Form::text('post_id', $postFile->post_id, ['class' => 'form-control' . ($errors->has('post_id') ? ' is-invalid' : ''), 'placeholder' => 'Post Id']) }}
            {!! $errors->first('post_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('file_name') }}
            {{ Form::text('file_name', $postFile->file_name, ['class' => 'form-control' . ($errors->has('file_name') ? ' is-invalid' : ''), 'placeholder' => 'File Name']) }}
            {!! $errors->first('file_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('file_size') }}
            {{ Form::text('file_size', $postFile->file_size, ['class' => 'form-control' . ($errors->has('file_size') ? ' is-invalid' : ''), 'placeholder' => 'File Size']) }}
            {!! $errors->first('file_size', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('file_blob') }}
            {{ Form::text('file_blob', $postFile->file_blob, ['class' => 'form-control' . ($errors->has('file_blob') ? ' is-invalid' : ''), 'placeholder' => 'File Blob']) }}
            {!! $errors->first('file_blob', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('file_url_fb') }}
            {{ Form::text('file_url_fb', $postFile->file_url_fb, ['class' => 'form-control' . ($errors->has('file_url_fb') ? ' is-invalid' : ''), 'placeholder' => 'File Url Fb']) }}
            {!! $errors->first('file_url_fb', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>