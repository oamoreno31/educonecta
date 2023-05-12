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
                                <div class="col-lg-12">
                                    <a class="btn btn-primary" href="{{ route('posts.index') }}">Regresar</a>
                                    <h3>{{ $post->title }}</h3>
                                </div>
                                <div class="col-lg-6">
                                    <strong>Descripción:</strong> {{ $post->description }}<br />
                                    <strong>Categoria:</strong> {{$post->category_name}}<br />
                                </div>
                                <div class="col-lg-6">
                                    <strong>Autor:</strong> {{ $post->author_name }}<br />
                                    <strong>Fecha:</strong> {{ date('d/m/Y', strtotime($post->post_date)) }}
                                </div>
                                <div class="col-lg-6">
                                    <strong>Tags:</strong>
                                        @foreach ($post->tags_names as $key=>$tags)
                                            @if(3 > $key)
                                            <span style="text-decoration: underline; color: darkblue;" > # {{$tags["name"]}}</span> 
                                            @endif
                                        @endforeach
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
                            @if ($post->userLikesPost == false)
                                <form action="{{ route('posts.like', ['post' => $post->id]) }}" method="POST" class="d-grid gap-2">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="route" value="posts.show">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary d-grid gap-2">Me Gusta</button>
                                </form>
                                @else
                                <form action="{{ route('posts.dislike', $post->id) }}" method="POST" class="d-grid gap-2">
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <input type="hidden" name="route" value="posts.show">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary d-grid gap-2">No Me gusta</button>
                                </form>
                            @endif
                            <p class="d-grid gap-2"><a href="{{ route('posts.pdf', ['post' => $post->id]) }}" class="btn btn-sm" style="color: black;"><i class="fa fa-fw fa-eye" style='font-size:15px;'></i> Ver PDF</a></p>
                            <p class="d-grid gap-2"><a href="{{ route('posts.download', ['post' => $post->id]) }}" class="btn btn-sm" style="color: black;"><i class="fa fa-fw fa-arrow-down" style='font-size:15px;'></i>Descargar</a></p>
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
