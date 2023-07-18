@extends('layouts.app')

@section('template_title')
    Tag
@endsection

@section('content')
    <div class="container-fluid">
        @if ($message = Session::get('success')) <div class="alert alert-primary"> <p>{{ $message }}</p> </div> @endif
        @if ($message = Session::get('error')) <div class="alert alert-dark"> <p>{{ $message }}</p> </div> @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span></span>
                            <div class="float-right">
                                <a href="{{ route('tags.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                  {{ __('Crear Tag') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Slug</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $tag->name }}</td>
											<td>{{ $tag->slug }}</td>

                                            <td class="text-right">
                                                <form action="{{ route('tags.destroy',$tag->id) }}" method="POST">
                                                    <a class="btn rounded-pill btn-sm btn-primary" href="{{ route('tags.show',$tag->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn rounded-pill btn-sm btn-secondary" href="{{ route('tags.edit',$tag->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn rounded-pill btn-dark btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tags->links() !!}
            </div>
        </div>
    </div>
@endsection
