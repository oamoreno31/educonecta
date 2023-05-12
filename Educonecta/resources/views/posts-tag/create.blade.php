@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Posts Tag
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Posts Tag</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('posts-tags.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('posts-tag.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
