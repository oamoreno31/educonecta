@extends('layouts.app')

@section('template_title')
    Post File
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Post File') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('post-files.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Post Id</th>
										<th>File Name</th>
										<th>File Size</th>
										<th>File Blob</th>
										<th>File Url Fb</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postFiles as $postFile)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $postFile->post_id }}</td>
											<td>{{ $postFile->file_name }}</td>
											<td>{{ $postFile->file_size }}</td>
											<td>{{ $postFile->file_blob }}</td>
											<td>{{ $postFile->file_url_fb }}</td>

                                            <td>
                                                <form action="{{ route('post-files.destroy',$postFile->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('post-files.show',$postFile->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('post-files.edit',$postFile->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $postFiles->links() !!}
            </div>
        </div>
    </div>
@endsection
