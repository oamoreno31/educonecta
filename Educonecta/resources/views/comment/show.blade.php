@extends('layouts.app')

@section('template_title')
    {{ $comment->name ?? "{{ __('Show') Comment" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Comment</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('comments.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Posts Id:</strong>
                            {{ $comment->posts_id }}
                        </div>
                        <div class="form-group">
                            <strong>Users Id:</strong>
                            {{ $comment->users_id }}
                        </div>
                        <div class="form-group">
                            <strong>Comments Id:</strong>
                            {{ $comment->comments_id }}
                        </div>
                        <div class="form-group">
                            <strong>Content:</strong>
                            {{ $comment->content }}
                        </div>
                        <div class="form-group">
                            <strong>State:</strong>
                            {{ $comment->state }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
