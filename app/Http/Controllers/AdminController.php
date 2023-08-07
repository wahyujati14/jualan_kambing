<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\History;
use App\Models\PenghasilanTahunan;
use PDF;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $penghasilan = PenghasilanTahunan::latest()->get();
        $history = History::latest()->get();

        return view('admin.index', compact('history', 'penghasilan'));
    } // End Method

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } // End Method

    public function AdminLogin()
    {
        return view('admin.admin_login');
    } // End Method

    public function AdminProfile()
    {
        // After Login
        $id = Auth::user()->id;
        // Find data id
        $profileData = User::find($id);

        return view('admin.admin__profile_view', compact('profileData'));
    } // End Method

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            // Remove old foto
            @unlink(public_path('upload/admin_images/' . $data->photo));
            // Make unique name file
            $filename = date('YmdHi') . $file->getClientOriginalName();
            // Pass the photo move path to upload folder
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        // Toast message
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function AdminChangePassword()
    {
        // After Login
        $id = Auth::user()->id;
        // Find data id
        $profileData = User::find($id);

        return view('admin.admin_change_password', compact('profileData'));
    } // End Method

    public function AdminUpdatePassword(Request $request)
    {
        // Validation Input password
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        // Match old password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            // Toast message
            $notification = array(
                'message' => 'Old password does not match!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

        // Update new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password change successfully!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    } // End Method

    public function generatePDF()
    {
        $penghasilan = PenghasilanTahunan::get();
  
        $data = [
            'title' => 'Penghasilan Tahunan',
            'date' => date('m/d/Y'),
            'penghasilan' => $penghasilan
        ]; 
            
        $pdf = PDF::loadView('myPDF', $data);
     
        return $pdf->download('Penghasilan Tahunan.pdf');
    }
}
