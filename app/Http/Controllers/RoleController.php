<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{   
    public $user;

    public function __construct()
    {
        $this->middleware(function($request, $next){
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index()
    {   
        // if(is_null($this->user) || !$this->user->can('roles.view')){
        //     abort(403, "Sorray !! You are unauthorized to view any role.");
        // }

        $data['title'] = __('Roles');
        $data['roles'] = Role::paginate(10);
        return view('backend.pages.roles.index', $data);
    }

    public function create()
    {   
        // if(is_null($this->user) || !$this->user->can('roles.create')){
        //     abort(403, "Sorray !! You are unauthorized to create any role.");
        // }

        $data['title'] = __('Role Create');
        $data['all_permissions']   = Permission::all();
    	$data['permission_groups'] = User::getPermissionGroups();
    	return view('backend.pages.roles.create', $data);
    }

    public function store(Request $request)
    {   
        // if(is_null($this->user) || !$this->user->can('roles.create')){
        //     abort(403, "Sorray !! You are unauthorized to store any role.");
        // }

        $request->validate([
            'name' => 'required|max:100|unique:roles',
            'slug' => 'max:100|unique:roles'
        ], 
        [
            'name.requried' => 'Please give a role name'
        ]);

        $role = Role::create([
            'name' => $request->get('name'),
            'slug' => str_replace(' ', '', strtolower($request->name)),
        ]);

        $permissions = $request->input('permissions');
    	if (!empty($permissions)) {
    		$role->syncPermissions($permissions);
    	}

        if(empty($role)){
            return redirect()->back()->withInput()->with('ERROR', __('Fail to created !!'));
        }
        return redirect()->route('roles.index')->with('SUCCESS', __('Role has been created successfully.'));
    }

    public function edit(Role $role)
    {   
        // if(is_null($this->user) || !$this->user->can('roles.edit')){
        //     abort(403, "Sorray !! You are unauthorized to edit any role.");
        // }

        $data['title'] = __('Edit Role');
        $data['role'] = $role;
        $data['all_permissions'] = Permission::all();
    	$data['permission_groups'] = User::getPermissionGroups();
    	return view('backend.pages.roles.edit', $data);
    }

    public function update(Request $request, Role $role)
    {   
        // if(is_null($this->user) || !$this->user->can('roles.edit')){
        //     abort(403, "Sorray !! You are unauthorized to update any role.");
        // }
        // $params = $request->only(['name','']);
 
        // if($department->update($params)){
        //     return redirect()->route('departments.index')->with('SUCCESS', __('Department has been updated successfully.'));
        // }
        // return redirect()->back()->withInput()->with('ERROR', __('Fail to updated'));

        // $request->validate([
        //     'name' => 'required|max:100|unique:roles,name,'.$role->id,
        //     'slug' => 'max:100|unique:roles,slug,'.$role->id
        // ], [
        //     'name.requried' => 'Please give a role name'
        // ]);

        //$role = Role::findById($id);
        $role = Role::findById($role->id);
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->slug = str_replace(' ', '', strtolower($request->name));
            $role->save();

            $role->syncPermissions($permissions);
        }

        return redirect()->route('roles.index')->with('SUCCESS', __('Role has been updated successfully.'));
    }

    public function destroy(Role $role)
    {   
        // if(is_null($this->user) || !$this->user->can('roles.delete')){
        //     abort(403, "Sorray !! You are unauthorized to delete any role.");
        // }

        if($role->delete()){
            return redirect()->route('roles.index');
        }
        return redirect()->back();
    }
}
