<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\DAO\PermissionDao;
use Illuminate\Http\Request;

/**
 * Class PermissionController
 * @package App\Http\Controllers
 */
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate();

        return view('permission.index', compact('permissions'))
            ->with('i', (request()->input('page', 1) - 1) * $permissions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = new Permission();
        return view('permission.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Permission::$rules);

        // $permission = Permission::create($request->all());
        $permission = PermissionDao::NewPermission($request)->detail;

        return redirect()->route('permissions.index')
            ->with('success', 'Permission created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $permission = Permission::find($id);
        $permission = PermissionDao::SearchById($id)->detail;

        return view('permission.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $permission = Permission::find($id);
        $permission = PermissionDao::SearchById($id)->detail;

        return view('permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        request()->validate(Permission::$rules);

        // $permission->update($request->all());
        PermissionDao::UpdatePersmission($permission, $request);
        return redirect()->route('permissions.index')
            ->with('success', 'Permission updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // $permission = Permission::find($id)->delete();
        $permission = PermissionDao::DeletePersmission($id)->detail;

        return redirect()->route('permissions.index')
            ->with('success', 'Permission deleted successfully');
    }
}
