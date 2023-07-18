@extends('layouts.app')

@section('template_title')
    Post
@endsection

@section('content')
<div class="row">
    @if ($message = Session::get('success'))
    <div class="alert alert-success"> <p>{{ $message }}</p> </div>
    @endif
    <div class="col-lg-2">
        @if (Auth::user() != "")
        <div class="card" style="width: 100%;">
            <div class="card-body"  style="text-align: center;">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>{{Auth::user()->name}}</h3>
                        @if (Auth::user()->role == 'user') 
                            <h5><span class="badge bg-success">Usuario</span></h5>
                        @elseif (Auth::user()->role == 'admin') 
                            <h5><span class="badge bg-success">Administrador</span></h5>
                        @endif

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6" style="border-right: 1px solid rgba(77, 77, 77, 0.493);">Ver Perfil</div>
                    <div class="col-lg-6"><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form></div>
                    
                </div>
            </div>
        </div>
        <hr>
        @endif
        <div class="card" style="width: 100%;">
            <div class="card-body">
              <p class="d-grid gap-2"><a href="{{ route('posts.create') }}" class="btn btn-success btn-block"  data-placement="left"> Nueva Publicacion </a></p>
              <h4>Categorias</h4>
              <ul class="list-group">
                @foreach ($categories as $category)
                @if($category->postsCounts > 0)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{$category->name}}<span class="badge bg-primary rounded-pill">{{$category->postsCounts}}</span>
                    </li>
                @endif
            @endforeach
              </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <h3>Ultimas Publicaciones</h3>
            </div>
            <hr>
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
            @foreach ($posts_ as $post)
            <div class="container">
                <div class="row ">
                  <div class="col-md-12">
                    <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="mt-0">{{$post -> title}}</h3>
                            <p>Categoria: <span class="badge text-bg-success">{{$post->category_name}}</span></p>
                            <p class="card-text">{{$post->description}}</p>
                        </div>
                        <div class="col-lg-3">
                            <p class="text-muted">Autor: {{$post -> author_name}}</p>
                            <?php
                                $res_tiempo = tiempo_publicacion($post -> created_at)
                            ?>
                            <p class="text-muted">Fecha: {{$res_tiempo}}</p>
                            <p class="text-muted">
                                <span class="badge text-bg-primary">{{$post->comentsCount}} Comentarios</span>
                                <span class="badge text-bg-primary">{{$post->likesCount}} Me Gusta</span><br/><br/>
                                <a href="{{ route('posts.pdf',$post->id) }}" target="_blank" class="btn btn-sm" style="color: black;"><i class="fa fa-fw fa-eye" style='font-size:20px;'></i> Ver PDF</a>
                                <a href="{{ route('posts.download',$post->id) }}" class="btn btn-sm" style="color: black;"><i class="fa fa-fw fa-download" style='font-size:17px'></i> Descargar</a>
                            </p>
                        </div>
                        
                        <div class="col-lg-2">
                            <p class="text-muted">Acciones</p>
                            @if (Auth::user()->id == $post->author_id and Auth::user()->role == 'teacher')
                            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm" style="color: black;"><i class="fa fa-fw fa-edit" style='font-size:20px;'></i> Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-sm" style="color: red;"><i class="fa fa-fw fa-trash" style='font-size:17px'></i> Eliminar</button>
                            </form>
                            @endif
                            <p class="d-grid gap-2">
                                <a href="{{ route('posts.show',$post->id) }}" class="btn btn-sm btn-primary">Ver mas</a>
                            </p>
                            @if ($post->userLikesPost == false)
                                <form action="{{ route('posts.like', ['post' => $post->id]) }}" method="POST" class="d-grid gap-2">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="route" value="posts.index">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary d-grid gap-2">Me Gusta</button>
                                </form>
                            @else
                                <form action="{{ route('posts.dislike', $post->id) }}" method="POST" class="d-grid gap-2">
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <input type="hidden" name="route" value="posts.index">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary d-grid gap-2">No Me gusta</button>
                                </form>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <p class="text-muted">Tags<br/>
                                @foreach ($post->tags_names as $key=>$tags)
                                    @if(3 > $key)
                                    <span style="text-decoration: underline; color: darkblue;" > # {{$tags["name"]}}</span> 
                                    @endif
                                    @if($key > 2)
                                         (mas tags)
                                    @endif
                                @endforeach
                                </p>
                        </div>
                    </div>
                        <!-- <hr>
                        <div class="row">
                          <div class="col-md-2 d-grid gap-2">
                            <button class="btn btn-primary"><i class="far fa-thumbs-up"></i> Me gusta</button>
                          </div>
                          <div class="col-md-9 d-grid gap-2">
                            <input type="text" class="form-control" placeholder="Escribe un comentario">
                          </div>
                          <div class="col-md-1 d-grid gap-2">
                            <button class="btn btn-outline-success"  type="button">Publicar</button>
                          </div>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <br/>
            @endforeach
            <!-- <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>No</th>
                                
                                <th>Titel</th>
                                <th>Description</th>
                                <th>Content</th>
                                <th>Post Date</th>
                                <th>Author Id</th>
                                <th>Author Name</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>{{ $post->post_date }}</td>
                                    <td>{{ $post->author_id }}</td>
                                    <td>{{ $post->author_name }}</td>

                                    <td>
                                        <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('posts.show',$post->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('posts.edit',$post->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> -->
        </div>
        {!! $posts->links() !!}
    </div>
</div>
@endsection
