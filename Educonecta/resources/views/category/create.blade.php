@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Category
@endsection

@section('content')
    <section class="content container-fluid">
        @if ($message = Session::get('error'))
            <div class="alert alert-dark">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row  d-flex justify-content-center align-items-center">
            <div class="col-md-8">

                @includeif('partials.errors')

                <div class="card mb-4">
                    <div class="card-header bg-dark d-flex justify-content-between">
                        <span></span>
                        <a class="btn btn-primary" href="{{ route('categories.index') }}">{{ __('Volver') }}</a>
                    </div>
                    <form method="POST" action="{{ route('categories.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf
                        @include('category.form')
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
