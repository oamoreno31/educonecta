<?php

namespace App\Http\Controllers;

use App\Http\DAO\PermissionDao;
use App\Http\DAO\PermissionRoleDao;
use App\Models\PermissionsRole;
use Illuminate\Http\Request;

/**
 * Class PermissionsRoleController
 * @package App\Http\Controllers
 */
class PermissionsRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissionsRoles = PermissionsRole::paginate();

        return view('permissions-role.index', compact('permissionsRoles'))
            ->with('i', (request()->input('page', 1) - 1) * $permissionsRoles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionsRole = new PermissionsRole();
        return view('permissions-role.create', compact('permissionsRole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PermissionsRole::$rules);

        // $permissionsRole = PermissionsRole::create($request->all());
        $permissionsRole = PermissionRoleDao::NewPermissionRole($request)->detail;

        return redirect()->route('permissions-roles.index')
            ->with('success', 'PermissionsRole created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $permissionsRole = PermissionsRole::find($id);
        $permissionsRole = PermissionRoleDao::SearchById($id);

        return view('permissions-role.show', compact('permissionsRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $permissionsRole = PermissionsRole::find($id);
        $permissionsRole = PermissionRoleDao::SearchById($id);

        return view('permissions-role.edit', compact('permissionsRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PermissionsRole $permissionsRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PermissionsRole $permissionsRole)
    {
        request()->validate(PermissionsRole::$rules);

        // $permissionsRole->update($request->all());
        PermissionRoleDao::UpdatePermissionRole($permissionsRole, $request);

        return redirect()->route('permissions-roles.index')
            ->with('success', 'PermissionsRole updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // $permissionsRole = PermissionsRole::find($id)->delete();
        $permissionsRole = PermissionRoleDao::DeletePermissionRole($id);

        return redirect()->route('permissions-roles.index')
            ->with('success', 'PermissionsRole deleted successfully');
    }
}
