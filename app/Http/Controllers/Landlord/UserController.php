<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function AllUsers()
    {
        $allusers = User::where('role', 'user')->orderBy('id','DESC')->get();
        return view('landlord.user.allusers', compact('allusers'));
        # code...
    }


    public function EditUserDetail($id)
    {
        $user = User::findOrFail($id);
        return view('landlord.user.user-details', compact('user'));
        # code...
    }

    public function UpdateUserStatus(Request $request)
    {
        $userid = $request->id;
        User::findOrFail($userid)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => "User Updated Successfully",
            'alert-type' => 'success'
    );
        return redirect()->route('all.users')->with($notification);
        # code...
    }


    public function ActiveUsers()
    {
        $activeuser = User::where('role', 'user')->where('status', 'active')->orderBy('id','DESC')->get();
        return view('landlord.user.active-user', compact('activeuser'));
        # code...
    }

    public function InactiveUsers()
    {
        $inactiveuser = User::where('role', 'user')->where('status', 'inactive')->orderBy('id','DESC')->get();
        return view('landlord.user.inactive-user', compact('inactiveuser'));
        # code...
    }
    public function DeleteUserDetail($id)
    {
        $user = User::findOrFail($id);
        $userImage = $user->photo;
        unlink($userImage);

        User::findOrFail($id)->delete();

        $notification = array(
            'message' => "User Deleted Successfully",
            'alert-type' => 'success'
    );
        return redirect()->back()->with($notification);

        # code...
    }
    //
}

