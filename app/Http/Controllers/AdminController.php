<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Production;
use App\Models\Sinistre;
use App\Models\SinistreDim;

class AdminController extends Controller
{
    public function AdminDashboard()
{
    $productions = Production::with('branches', 'compagnies', 'act_gestions', 'charge_comptes')->get();
    $sinistres_dim = SinistreDim::with('branches_dim', 'compagnies', 'acte_de_gestion_dim', 'charge_compte_dim')->get();
    $sinistres = Sinistre::with('branches_sinistres', 'compagnies', 'acte_de_gestion_sinistres', 'charge_compte_sinistres')->get();
    $totalProduction = Production::count(); 
    $totalSinistreDim = SinistreDim::count();
    $totalSinistreAt_Rd = Sinistre::count();

    return view('admin.index', compact('totalProduction', 'totalSinistreDim', 'totalSinistreAt_Rd', 'sinistres_dim', 'sinistres', 'productions'));
}

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }

   
   
    public function AdminProfileStore(Request $request)
{
    $id = Auth::user()->id;
    $data = User::find($id);
    $data->username = $request->username;
    $data->name = $request->name;
    $data->email = $request->email;
    // $data->role = $request->role;
    // $data->status = $request->status;

    // Update password only if a new password is provided

    if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }
        
    $data->save();
    $notification = array(
        'message' => 'Admin Profile Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
}

public function AdminChangePassword (){
    $id = Auth::user()->id;
    $profileData = User::find($id);
    return view('admin.admin_change_password', compact('profileData'));
}

public function AdminUpdatePassword (Request $request){
    //validation
   $request->validate([
    'old_password' => 'required',
    'new_password' => 'required|confirmed',
   ]);
   
   //Match The Old Password
   if(!Hash::check($request->old_password, auth::user()->password)){
    $notification = array(
        'message' => 'Old Password Does Not Match!',
        'alert-type' => 'error'
    );

    return back()->with($notification);
   };
   //Update The New Password
   User::whereId(auth()->user()->id)->update([
    'password' => Hash::make($request->new_password)
   ]);

   $notification = array(
    'message' => 'Password Changed Successfully ',
    'alert-type' => 'success'
);

return back()->with($notification);
}
  
}
