@extends('layouts.app')

@section('template_title')
{{ isset($category->name) ? $category->name : __('Ver Tag') }}
@endsection

@section('content')
    <section class="content">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card text-center mb-3">
                    <div class="card-header bg-dark d-flex justify-content-between">
                        <a class="btn btn-secondary" href="{{ route('tags.edit',$tag->id) }}">{{ __('Editar') }}</a>
                        <span></span>
                        <a class="btn btn-primary" href="{{ route('tags.index') }} ">{{ __('Volver') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="row pt-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {{ $tag->name }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Slug:</strong>
                                    {{ $tag->slug }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
