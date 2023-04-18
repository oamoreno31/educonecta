@extends('layouts.app')

@guest
@section('content')
You can't access to this page
@endsection
@else

    @section('template_title')
        Feed
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    {{ __('Feed') }}
                                </span>
                                @if (Auth::user()->role == 'teacher')
                                    <div class="float-right">
                                        <a href="{{ route('publicaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                            {{ __('Create New') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            <!-- Entrada de Feed -->
                            @foreach ($publicaciones as $publicacione)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $publicacione->titulo }}</h5>
                                    <p class="card-text">{{ $publicacione->descripcion }}</p>
                                    <p class="card-text"><b>Autor: </b>{{ $publicacione->author_name }}</p>
                                    <form action="{{ route('publicaciones.destroy',$publicacione->id) }}" method="POST">
                                    <a href="{{ route('publicaciones.show',$publicacione->id) }}" class="btn btn-primary">Leer más</a>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                            <!-- Fin de Entrada de Feed -->
                            <!-- <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            
                                            <th>Titulo</th>
                                            <th>Descripcion</th>
                                            <th>Contenido</th>
                                            <th>Author Id</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($publicaciones as $publicacione)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                
                                                <td>{{ $publicacione->titulo }}</td>
                                                <td>{{ $publicacione->descripcion }}</td>
                                                <td>{{ $publicacione->contenido }}</td>
                                                <td>{{ $publicacione->author_id }}</td>

                                                <td>
                                                    <form action="{{ route('publicaciones.destroy',$publicacione->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('publicaciones.show',$publicacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('publicaciones.edit',$publicacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> -->
                        </div>
                    </div>
                    {!! $publicaciones->links() !!}
                </div>
            </div>
        </div>
    @endsection
@endguest
