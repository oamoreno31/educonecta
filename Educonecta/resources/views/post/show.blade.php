@extends('layouts.app')

@php
    function time_at($fecha)
    {
        $segundos = time() - strtotime($fecha);
        $minutos = floor($segundos / 60);
        $horas = floor($segundos / 3600);
        $dias = floor($segundos / 86400);
        if ($segundos < 60) {
            return 'hace unos segundos';
        } elseif ($minutos < 60) {
            return "hace {$minutos} minutos";
        } elseif ($horas < 24) {
            return "hace {$horas} horas";
        } else {
            return "hace {$dias} días";
        }
    }
@endphp

@section('template_title')
    {{ isset($post->name) ? $post->name : __('Show Post') }}
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
                                    <strong>Categoria:</strong> Categoria<br />
                                    <strong>Tags:</strong>
                                    <span class="badge text-bg-success">Success</span>
                                    <span class="badge text-bg-success">Success</span>
                                    <span class="badge text-bg-success">Success</span><br />
                                    <strong>Autor:</strong> {{ $post->author_name }}<br />
                                    <strong>Fecha:</strong> {{ date('d/m/Y', strtotime($post->post_date)) }}
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mt-5">
                <div class="card">
                    <div class="card-header">
                        Comentarios
                    </div>
                    <div class="card-body">
                        @forelse ($post->comments->whereNull('comments_id') as $com)
                            {{-- {{ $comments_id = $com->comments }} --}}
                            @php
                                $level = 0
                            @endphp
                            @include('post.comments')
                            <hr style="border: 5px solid black;">
                        @empty
                            No existen comentarios para este Post
                        @endforelse
                    </div>
                </div>
            </div>
            @if (Auth::check())
                @php
                    $comment = new App\Models\Comment();
                @endphp
                @include('comment.create')
            @endif
        </div>
    </section>
@endsection
