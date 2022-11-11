<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->file('profile_image')) {
            File::delete(public_path('upload/admin_image/' . $user->profile_image));
            $file = $request->file('profile_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'), $filename);
            $user['profile_image'] = $filename;
        }

        $user->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function edit()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.admin_edit_profile', compact('user'));
    }

    public function editpassword()
    {
        return view('admin.admin_edit_password');
    }

    public function updatepassword(Request $request)
    {
        $validatedData = $request->validate([
            'oldpassword' => 'required|min:8',
            'newpassword' => 'required|min:8',
            'confirmpassword' => 'required|min:8|same:newpassword'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->newpassword);
            $user->save();

            $request->session()->flash('message', 'Password Updated Successfully');
            return redirect()->back();
        } else {
            $request->session()->flash('message', 'Old Password is not match');
            return redirect()->back();
        }
    }


    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.admin_profile_view', compact('user'));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
