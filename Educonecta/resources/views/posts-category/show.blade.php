@extends('layouts.app')

@section('template_title')
    {{ $postsCategory->name ?? "{{ __('Show') Posts Category" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Posts Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('posts-categories.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Posts Id:</strong>
                            {{ $postsCategory->posts_id }}
                        </div>
                        <div class="form-group">
                            <strong>Categories Id:</strong>
                            {{ $postsCategory->categories_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
