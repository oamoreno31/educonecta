@extends('layouts.app')

@section('template_title')
    {{ __('Actualizar') }} Perfil
@endsection

@section('content')
    @if ($message = Session::get('success')) <div class="alert alert-primary"> <p>{{ $message }}</p> </div> @endif
    @if ($message = Session::get('error')) <div class="alert alert-dark"> <p>{{ $message }}</p> </div> @endif
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                @includeif('partials.errors')
                <div class="card mb-4">
                    <div class="card-header bg-dark d-flex justify-content-between">
                        <span></span>
                        <a class="btn btn-primary" href="{{ URL::previous() }}">{{ __('Volver') }}</a>
                    </div>
                    <form method="POST" action="{{ route('profile.update') }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        @include('profile.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
