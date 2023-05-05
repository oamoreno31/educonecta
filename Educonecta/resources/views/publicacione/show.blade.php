@extends('layouts.app')

@section('template_title')
    {{ $publicacione->name ?? "{{ __('Show') Publicacione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Publicacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('publicaciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $publicacione->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $publicacione->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Contenido:</strong>
                            {!! $publicacione->contenido !!}
                        </div>
                        <div class="form-group">
                            <strong>Autor:</strong>
                            {{ $publicacione->author_name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
