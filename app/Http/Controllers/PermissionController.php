<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $data['title'] = __('Permissions');
        $data['permissions'] = Permission::get();
        return view('backend.pages.permissions.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Permission Create');
    	return view('backend.pages.permissions.create', $data);
    }

    public function store(Request $request)
    {   //dd($request->toArray());
        $permission = Permission::create([
            'group_name' => $request->get('group_name'),
            'name' => $request->get('name'),
            'guard_name' => $request->get('guard_name'),
        ]);

        if(empty($role)){
            return redirect()->back()->withInput()->with('ERROR', __('Fail to created !!'));
        }
        return redirect()->route('permissions.index')->with('SUCCESS', __('Permission has been created successfully.'));
    }

    public function edit(Permission $permission)
    {
        $data['title'] = __('Edit Permission');
        $data['permission'] = $permission;
    	return view('backend.pages.permissions.edit', $data);
    }

    public function update(Request $request, Permission $permission)
    {
        $params = $request->only(['group_name','name','guard_name']);
 
        if($permission->update($params)){
            return redirect()->route('permissions.index')->with('SUCCESS', __('Permission has been updated successfully.'));
        }
        return redirect()->back()->withInput()->with('ERROR', __('Fail to updated'));
    }

    public function destroy(Permission $permission)
    {
        if($permission->delete()){
            return redirect()->route('permissions.index');
        }
        return redirect()->back();
    }
}
