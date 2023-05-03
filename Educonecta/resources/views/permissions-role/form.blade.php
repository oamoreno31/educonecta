<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('permissions_id') }}
            {{ Form::text('permissions_id', $permissionsRole->permissions_id, ['class' => 'form-control' . ($errors->has('permissions_id') ? ' is-invalid' : ''), 'placeholder' => 'Permissions Id']) }}
            {!! $errors->first('permissions_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('roles_id') }}
            {{ Form::text('roles_id', $permissionsRole->roles_id, ['class' => 'form-control' . ($errors->has('roles_id') ? ' is-invalid' : ''), 'placeholder' => 'Roles Id']) }}
            {!! $errors->first('roles_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>