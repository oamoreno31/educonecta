@extends('layouts.app')

@section('template_title')
    {{ $postFile->name ?? "{{ __('Show') Post File" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Post File</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('post-files.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Post Id:</strong>
                            {{ $postFile->post_id }}
                        </div>
                        <div class="form-group">
                            <strong>File Name:</strong>
                            {{ $postFile->file_name }}
                        </div>
                        <div class="form-group">
                            <strong>File Size:</strong>
                            {{ $postFile->file_size }}
                        </div>
                        <div class="form-group">
                            <strong>File Blob:</strong>
                            {{ $postFile->file_blob }}
                        </div>
                        <div class="form-group">
                            <strong>File Url Fb:</strong>
                            {{ $postFile->file_url_fb }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
