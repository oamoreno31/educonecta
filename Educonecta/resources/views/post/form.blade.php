<script src="{{ asset('assets/vendor/tinymce/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>tinymce.init({ selector: '#content' }); $('Tags').selectpicker();</script>

<div class="col-xxl">
    <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0"></h5>
        <small class="text-muted float-end"><div class="row justify-content-end">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Publicar</button>
            </div>
        </div></small>
    </div>
    <div class="card-body">
        
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Titulo de la publicación</label>
            <div class="col-sm-10">
                {{ Form::text('title', $post->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el titulo de la publicación', "maxlength" => 50]) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">Descripción corta</label>
            <div class="col-sm-10">
                    {{ Form::text('description', $post->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese una descripción corta', "maxlength" => 100]) }}
                    {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-email">Categoria</label>
            <div class="col-sm-10">
                {!! Form::select('category_id', $options, $post->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : '')]) !!}
                {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">Tags</label>
            <div class="col-sm-10">
                {!! Form::select('Tags[]', $tags_data, $post->Tags, ['class' => 'form-control' . ($errors->has('Tags') ? ' is-invalid' : ''), 'multiple' => true]) !!}
                {!! $errors->first('Tags', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Contenido</label>
            <div class="col-sm-10">
                {{ Form::textarea('content', $post->content, ['class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Content', 'id' => "content"]) }}
                {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" style="vertical-align: middle;"><button type="button" class="btn btn-primary" id="btnNewFile" onclick="btnAddOnCLick()">Nuevo Archivo</button></label>
            <div class="col-sm-10">
                
            <div class="card" style="margin-top: 15px;">
                    <div class="card-header">
                        <strong>Cargar archivos</strong><br/>
                        <small>Da click y selecciona los archivos que desees cargar</small>
                    </div>
                    <input type="hidden" name="files_count" id="files_count">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12"></div>
                                <div class="col-lg-12" id="filesContainer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            {{ Form::text('post_date', date('Y-m-d'), ['class' => 'form-control' . ($errors->has('post_date') ? ' is-invalid' : ''), 'placeholder' => 'Post Date', 'hidden' => 'true']) }}
            {!! $errors->first('post_date', '<div class="invalid-feedback">:message</div>') !!}

            {{ Form::text('author_id', Auth::user()->id, ['class' => 'form-control' . ($errors->has('author_id') ? ' is-invalid' : ''), 'placeholder' => 'Author Id', 'hidden' => 'true']) }}
            {!! $errors->first('author_id', '<div class="invalid-feedback">:message</div>') !!}

            {{ Form::text('author_name', Auth::user()->name, ['class' => 'form-control' . ($errors->has('author_name') ? ' is-invalid' : ''), 'placeholder' => 'Author Name', 'hidden' => 'true']) }}
            {!! $errors->first('author_name', '<div class="invalid-feedback">:message</div>') !!}

            {{ Form::text('likes', 0, ['class' => 'form-control' . ($errors->has('likes') ? ' is-invalid' : ''), 'placeholder' => 'likes', 'hidden' => 'true']) }}
            {!! $errors->first('likes', '<div class="invalid-feedback">:message</div>') !!}
            
    </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/educonecta_custom_lib.js') }}"></script>