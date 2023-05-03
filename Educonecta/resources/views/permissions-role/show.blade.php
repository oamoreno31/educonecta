@extends('layouts.app')

@section('template_title')
    {{ $permissionsRole->name ?? "{{ __('Show') Permissions Role" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Permissions Role</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('permissions-roles.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Permissions Id:</strong>
                            {{ $permissionsRole->permissions_id }}
                        </div>
                        <div class="form-group">
                            <strong>Roles Id:</strong>
                            {{ $permissionsRole->roles_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
