<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TenantsController extends Controller
{
    public function AllTenants()
    {
        $alltenants = User::where('role', 'tenant')->orderBy('id', 'DESC')->get();
        return view('landlord.tenant.alltenants', compact('alltenants'));

        # code...
    }

    public function EditTenantDetail($id)
    {
        $user = User::findOrFail($id);
        return view('landlord.tenant.tenant-details', compact('user'));
        # code...
    }

    public function UpdateTenantStatus(Request $request)
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
            'message' => "Tenant Updated Successfully",
            'alert-type' => 'success'
    );
        return redirect()->route('all.tenants')->with($notification);
        # code...
    }

    public function ActiveTenant()
    {
        $activetenant = User::where('status', 'active')->where('role', 'tenant')->orderBy('id','DESC')->get();
        return view('landlord.tenant.active-tenant', compact('activetenant'));
        # code...
    }

    public function InactiveTenant()
    {
        $inactivetenant = User::where('status', 'inactive')->where('role', 'tenant')->orderBy('id','DESC')->get();
        return view('landlord.tenant.inactive-tenant', compact('inactivetenant'));
        # code...
    }

    public function DeleteTenantDetail($id)
    {
        $user = User::findOrFail($id);
        $userImage = $user->photo;
        unlink($userImage);

        User::findOrFail($id)->delete();

        $notification = array(
            'message' => "Tenant Deleted Successfully",
            'alert-type' => 'success'
    );
        return redirect()->back()->with($notification);
        # code...
    }
    //
}
