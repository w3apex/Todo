<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $data['title'] = __('Users');
        //$data['users'] = User::paginate(10);
        $data['users'] = User::all();
        return view('backend.pages.users.index', $data);
    }

    public function create()
    {
        $data['title'] = __('Create User');
        $data['roles']  = Role::all();
        return view('backend.pages.users.create', $data);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name'     => 'required|max:50',
        //     'email'    => 'required|max:100|email|unique:admins',
        //     'username' => 'required|max:100|unique:admins',
        //     'password' => 'required|min:6|confirmed',
        // ]);

        // $path = "";
        // if ($request->hasFile("image")) {
        //     $path = $request->file("image")->store("images/users");
        // }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            //'image'   => $path,
        ]);
        
        if(empty($user)){
            return redirect()->back()->withInput()->with('ERROR', __('Fail to created !!'));
        }

        if ($request->get('roles')) {
            $user->assignRole($request->get('roles'));
        }
        return redirect()->route('users.index')->with('SUCCESS', __('User has been updated successfully.'));
    }

    public function edit(User $user)
    {
        $data['title'] = __('Edit User');
        $data['user'] = $user;
        //$data['departments'] = Department::pluck('name', 'id');
        $data['roles']  = Role::all();
        return view('backend.pages.users.edit', $data);
    }

    public function update(Request $request, User $user)
    {   
    	//Validation Data
        // $request->validate([
        //     'name' => 'required|max:50',
        //     'email' => 'required|max:100|email|unique:users,email,' . $user->id,
        //     'password' => 'nullable|min:6|confirmed',
        //     'department_id' => 'required',
        // ]);

        // if($request->hasFile("image")){
        //     if($user->image){
        //         Storage::delete($user->image);
        //     }
        //     $path = $request->file("image")->store('images/posts');
        // }

        $now = now();
        if($user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'created_at' => $now,
            'updated_at' => $now,
        ])){
            $user->roles()->detach();
            if ($request->roles) {
                $user->assignRole($request->get('roles'));
            }
            return redirect()->route('users.index')->with('SUCCESS', __('User has been updated successfully.'));
        }
    }

    public function destroy(User $user)
    {
        if($user->delete()){
            return redirect()->back()->with('SUCCESS', __('User has been deleted successfully'));
        }
        return redirect()->back()->with('ERROR', __('Fail to delete this user !'));
    }
}
