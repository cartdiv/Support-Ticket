<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;

class TenantDashboard extends Controller
{
    public function TenantDashboard()
    {
        return view('tenant.index');
        # code...
    }

    public function TenantChangePassword()
    {
        return view('tenant.change-password');
        # code...
    }
    public function TenantUpdateChangePassword(Request $request)
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
            
            return redirect()->route('tenant.login')->with($nottification);
        }else{
            $nottification = array(
                'message' => 'Check your Old Password',
                'alert-type' => 'error',
            );

            Auth::logout();
            
            return redirect()->route('tenant.login')->with($nottification);
        }
    }

    public function TenantEditProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('tenant.editprofile', compact('user'));
        # code...
    }

    public function UpdateTentantDetails(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->description = $request->description;

        if($request->file('photo')){
            $file = $request->file('photo');
            
            @unlink(public_path('upload/tenant_photo/'.$data->photo));

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/tenant_photo'),$filename);
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

    public function TenantLogin()
    {
        return view('tenant.tenant-login');
        # code...
    }

    public function TenantLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        $nottification = array(
            'message' => 'Logout successfully',
            'alert-type' => 'success',
        );
        return redirect('/tenant/login')->with($nottification);
        # code...
    }
    //
}
