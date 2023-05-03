@extends('layouts.app')

@section('template_title')
    {{ $post->name ?? "{{ __('Show') Post" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <div class="row">
                                <div class="col-lg-10">
                                    <a class="btn btn-primary" href="{{ route('posts.index') }}">Regresar</a>
                                    <h3>{{ $post->title }}</h3>
                                    <strong>Descripción:</strong> {{ $post->description }}
                                </div>
                                <div class="col-lg-2">
                                    <strong>Categoria:</strong> Categoria<br/>
                                    <strong>Tags:</strong>
                                    <span class="badge text-bg-success">Success</span>
                                    <span class="badge text-bg-success">Success</span>
                                    <span class="badge text-bg-success">Success</span><br/>
                                    <strong>Autor:</strong> {{ $post->author_name }}<br/>
                                    <strong>Fecha:</strong> {{date("d/m/Y", strtotime($post->post_date));}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                            {!! $post->content !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card">
                  <div class="card-header">Interacciones</div>
                  <div class="card-body">
                    <div class="media">
                      <div class="media-body row">
                        <div class="col-md-12 d-grid gap-2">
                          <button class="btn btn-outline-primary" type="button">Me Gusta</button>
                          <button class="btn btn-primary" type="button">Me Gusta</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="card">
                  <div class="card-header">Comentarios</div>
                  <div class="card-body">
                    <div class="media">
                      <div class="media-body row">
                        <div class="col-md-12">
                          <input type="text" class="form-control" placeholder="Escribe un comentario">
                        </div><hr>
                        <div class="col-md-12 d-grid gap-2">
                          <button class="btn btn-outline-success"  type="button">Publicar</button>
                        </div>
                      </div>
                    </div>
                    <hr style="border-bottom: 1px solid black;">
                    <div class="media">
                      <div class="media-body">
                        <h6 class="mt-0">Nombre de usuario</h6>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                      </div>
                    </div>
                    <hr>
                  </div>
                </div>
            </div>
        </div>
    </section>
@endsection
