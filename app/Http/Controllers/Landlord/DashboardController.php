<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class DashboardController extends Controller
{
    public function LandlordDashboard()
    {
        return view('landlord.index');
        # code...
    }

    public function LandlordChangePassword()
    {
        return view('landlord.change-password');
        # code...
    }
    public function LandlordUpdateChangePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $users = user::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            

            $nottification = array(
                'message' => 'Admin Password updated Successfully',
                'alert-type' => 'success',
            );
            Auth::logout();
            
            return redirect()->route('landlord.login')->with($nottification);
        }else{
            $nottification = array(
                'message' => 'Check your Old Password',
                'alert-type' => 'error',
            );

            Auth::logout();
            
            return redirect()->route('landlord.login')->with($nottification);
        }
    }
    public function LandlordEditProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('landlord.editprofile', compact('user'));
        # code...
    }

    public function UpdateLandlordDetails(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->description = $request->description;

        if($request->file('photo')){
            $file = $request->file('photo');
            
            @unlink(public_path('upload/landlord_photo/'.$data->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/landlord_photo'),$filename);
            $data['photo'] = $filename;
           }
           $data->save();
    
           $nottification = array(
                'message' => "Your Profile Image Updated Successfully",
                'alert-type' => 'success'
           );
    
           return redirect()->back()->with($nottification);
        # code...
    }

    public function LandlordLogin()
    {
        return view('landlord.landlord-login');
        # code...
    }

    public function LandlordLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        $nottification = array(
            'message' => 'Logout successfully',
            'alert-type' => 'success',
        );
        return redirect('/landlord/login')->with($nottification);
        # code...
    }
    //
}
