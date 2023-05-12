@extends('layouts.app')

@section('template_title')
    Posts Tag
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Posts Tag') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('posts-tags.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Posts Id</th>
										<th>Tags Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postsTags as $postsTag)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $postsTag->posts_id }}</td>
											<td>{{ $postsTag->tags_id }}</td>

                                            <td>
                                                <form action="{{ route('posts-tags.destroy',$postsTag->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('posts-tags.show',$postsTag->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('posts-tags.edit',$postsTag->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                    </div>
                </div>
                {!! $postsTags->links() !!}
            </div>
        </div>
    </div>
@endsection
