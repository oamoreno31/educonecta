@extends('layouts.app')

@section('template_title')
    {{ $role->name ?? "{{ __('Show') Role" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Role</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $role->name }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $role->slug }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
