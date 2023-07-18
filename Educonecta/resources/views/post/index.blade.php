@extends('layouts.app')

@section('template_title')
Publicaciones
@endsection

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success"> <p>{{ $message }}</p> </div>
    @endif

    <?php
        function array_sort($array, $on, $order=SORT_ASC) {
            $new_array = array();
            $sortable_array = array();

            if (count($array) > 0) {
                foreach ($array as $k => $v) {
                    if (is_array($v)) {
                        foreach ($v as $k2 => $v2) {
                            if ($k2 == $on) {
                                $sortable_array[$k] = $v2;
                            }
                        }
                    } else {
                        $sortable_array[$k] = $v;
                    }
                }

                switch ($order) {
                    case SORT_ASC:
                        asort($sortable_array);
                    break;
                    case SORT_DESC:
                        arsort($sortable_array);
                    break;
                }

                foreach ($sortable_array as $k => $v) {
                    $new_array[$k] = $array[$k];
                }
            }

            return $new_array;
        }
        function tiempo_publicacion($fecha) {
            $segundos = time() - strtotime($fecha);
            $minutos = floor($segundos / 60);
            $horas = floor($segundos / 3600);
            $dias = floor($segundos / 86400);
        
            if ($segundos < 60) {
                return "hace unos segundos";
            } elseif ($minutos < 60) {
                return "hace {$minutos} minutos";
            } elseif ($horas < 24) {
                return "hace {$horas} horas";
            } else {
                return "hace {$dias} días";
            }
        }
        $posts_ = array_sort($posts, 'created_at', SORT_DESC)          
    ?>
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card text-center mb-3">
            <div class="card-body">
                <h5 class="card-title">Realiza una nueva publicación</h5>
                <p class="card-text">¡Es hora de brillar! ¡Hazlo con una publicación nueva que inspire y motive a otros!</p>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Crear Publicacion</a>
            </div>
            </div>
        </div>
        @foreach ($posts_ as $post)
        <?php
            $res_tiempo = tiempo_publicacion($post -> created_at)
        ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-7"><h5 class="card-title">{{$post -> title}}</h5></div>
                                    <div class="col-lg-5"><p class="card-text" style="text-align: right;"><small class="text-muted" >{{$res_tiempo}}</small></p></div>
                                </div>
                                
                                <p class="card-text">{{$post->description}}</p>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="row">
                                            <div class="col-lg-4"><i class='bx bx-comment'></i> {{$post->comentsCount}}</div>
                                            <div class="col-lg-4">
                                            @if ($post->userLikesPost == false)
                                            <form action="{{ route('posts.like', ['post' => $post->id]) }}" method="POST" >
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" name="route" value="posts.index">
                                                <button type="submit" style="all: unset; cursor: pointer;"><i class='bx bx-heart' style="font-size: medium;"></i> {{$post->likesCount}}</button>
                                            </form>
                                            @else
                                            <form action="{{ route('posts.dislike', ['post' => $post->id]) }}" method="POST" >
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" name="route" value="posts.index">
                                                <button type="submit" style="all: unset; cursor: pointer;"><i class='bx bxs-heart' style="color: red; font-size: medium;" ></i> {{$post->likesCount}}</button>
                                            </form>
                                            @endif
                                            </div>
                                            <div class="col-lg-4"><i class='bx bx-file-blank' ></i> {{$post->filesCount}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a href="{{ route('posts.show',$post->id) }}" class="card-link">Ver publicación</a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
