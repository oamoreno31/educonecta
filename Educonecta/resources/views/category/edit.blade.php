@extends('layouts.app')

@section('template_title')
    {{ __('Actualizar') }} Categoría
@endsection

@section('content')
        @if ($message = Session::get('error'))
            <div class="alert alert-dark">
                <p>{{ $message }}</p>
            </div>
        @endif
    <section class="content">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-5">

                @includeif('partials.errors')

                <div class="card mb-4">
                    <div class="card-header bg-dark d-flex justify-content-between">
                        <span></span>
                        <a class="btn btn-primary" href="{{ URL::previous() }}">{{ __('Volver') }}</a>
                    </div>
                    <form method="POST" action="{{ route('categories.update', $category->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf
                        @include('category.form')
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
