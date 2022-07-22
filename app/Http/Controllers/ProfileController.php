<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $data['title'] = "Profile";
        $data['user'] = User::find($userId);
        return view("backend.pages.users.profile", $data);
    }

    public function update(Request $request)
    {   dd($request->toArray());
        $data = User::find(Auth::user()->id);
        if($request->hasFile("image")){
            if($data->image){
                Storage::delete($data->image);
            }
            $path = $request->file("image")->store('images/users');
        }

    	$data->first_name = $request->first_name;
    	$data->last_name = $request->last_name;
    	$data->email = $request->email;
        $data->phone = $request->phone;
        $data->dob = $request->dob;
        $data->nid = $request->nid;
    	$data->image = $path;
    	$data->save();

        // $user->update([
        //     "name" => $request->get('name'),
        //     "email" => $request->get('email'),
        //     "username" => $request->get('username'),
        //     "phone" => $request->get('phone'),
        //     "image" => $path,
        // ]);

        //$params = $request->only(['name','email','username','phone']);
        //$params['user_id'] = Auth::user()->id;
        //$params['image'] = $path;   
 
        if($data){
            return redirect()->back()->with('SUCCESS', __('Profile has been updated successfully.'));
        }

        return redirect()->back()->withInput()->with('ERROR', __('Fail to updated'));
    }

    public function passwordUpdate(Request $request)
    {
        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
    		$user = User::find(Auth::user()->id);
    		$user->password = bcrypt($request->new_password);
    		$user->save();

    		return redirect()->back()->with('success','Your password successfully changed..');
    	}
    	else {
    		return redirect()->back()->with('error','Sorry!! Current password does not match.');
    	}

    }
}
