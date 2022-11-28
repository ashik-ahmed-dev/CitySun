<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index(){
        $title = 'Dashboard';
        return view('admin.index', compact('title'));
    }

    public function profile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.profile.profile', compact('user'));
    }

    public function profile_store(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        if ($request->file('photo_path')) {
            $image = $request->file('photo_path');
            @unlink(public_path($data->photo_path));
            $filename = hexdec(uniqid());
            Image::make($image)->resize(64, 64)->save(public_path('storage/users/'.$filename.'.webp'), 60);
            $data['photo_path'] = 'storage/users/'.$filename.'.webp';
        }
        $data->save();
        return redirect()->back()->with('success','data saved successfully');
    }

    public function change_password(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('logout');
        }else{
            return redirect()->back()->with('error','data not updated successfully');
        }
    }


}
