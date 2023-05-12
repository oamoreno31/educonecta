@extends('layouts.app')

@section('template_title')
    {{ $postsTag->name ?? "{{ __('Show') Posts Tag" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Posts Tag</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('posts-tags.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Posts Id:</strong>
                            {{ $postsTag->posts_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tags Id:</strong>
                            {{ $postsTag->tags_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
