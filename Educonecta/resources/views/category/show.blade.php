@extends('layouts.app')

@section('template_title')
    {{ isset($category->name) ? $category->name : __('Ver Categoría') }}
@endsection

@section('content')
    <section class="content">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-8">
                <div class="card text-center mb-3">
                    <div class="card-header bg-dark d-flex justify-content-between">
                        <a class="btn btn-secondary" href="{{ route('categories.edit',$category->id) }}">{{ __('Editar') }}</a>
                        <span></span>
                        <a class="btn btn-primary" href="{{ route('categories.index') }} ">{{ __('Volver') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="row pt-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Nombre:</strong>
                                    {{ $category->name }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Slug:</strong>
                                    {{ $category->slug }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
