<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Validator;

class adminController extends Controller
{
    public function dashboard(){

        $getBuyers = User::where('user_roll', 'buyer')->get();
        $getSellers = User::where('user_roll', 'seller')->get();
        $getAdmins = User::where('user_roll', 'admin')->get();
        $getLastJoinedPeople = User::latest('created_at')->get()->count();

        // $getPeople = User::where('user_roll', 'buyer')
        //                     ->orWhere('user_roll', 'seller')
        //                     ->get();
        
        
        $dashboardData = [
            'title' => 'Dashboard',
            'buyersCount' => $getBuyers->count(),
            'sellersCount' => $getSellers->count(),
            'newJoined' => $getLastJoinedPeople,
            'admins' => $getAdmins,
            'buyers' => $getBuyers,
            'sellers' => $getSellers,
        ];

        return view('admin.dashboard', $dashboardData);
    }

    public function ViewProfile($id){
        if(Session::get('user')->id == $id){
            $profile_data = User::find($id);
            return view('admin.profile', [ 'title' => 'Profile', 'data' => $profile_data]);
        }
        else{
            $profile_data = User::find($id);
            return view('admin.profile', [ 'title' => 'Profile', 'data' => $profile_data]);
            // return $profile_data;
        }
        
    }

    public function uploadImage($id, Request $req){
        $img = $req->file('profile_photo');

        if ($img == null) {
          return back()->with('err','Profile Picture is not updated');
        }else{
            
            $image_name = $img->getClientOriginalName();
    
            $img->move(public_path('uploads'), $image_name);

    
            
            $user = User::find($id);
            $user->profile_image =$img->getClientOriginalName();
            $user->save();

            return back()->with('pic_upload','Profile Picture is updated');
        }
    }

    public function resetPassword(){

        $resetPassword_data = [
            'title' => 'Reset password'
        ];
        return view('admin.resetPassword', $resetPassword_data);
        // return $id;
    }

    public function changePassword(Request $req){
        $checkValidation = Validator::make($req->all(), [
            'password' => 'required|min:6|required_with:repassword|same:repassword',
			'repassword' => 'required|min:6',
        ]);

        if($checkValidation->fails()){
    		return redirect()->route('resetPassword')->withErrors($checkValidation);
        }else{
            DB::table('user')
                        ->where('id', Session::get('user')->id)
                        ->update(['password' => $req->password]);
            
    		$req->session()->flash('alert', 'Password Changed!<br>Please Login');
            return redirect()->route('login');
        }

        // return $req->input();
    }

    public function EditProfile($id, Request $req){

        $getUser = User::find($id);

        $edit_profile = [
            'title' => 'Edit Profile',
            'data' => $getUser
        ];
        return view('admin.editProfile', $edit_profile);
    }

    public function saveProfile($id, Request $req){
        
        DB::table('user')
                    ->where('id', $id)
                    ->update([
                        'full_name' => $req->full_name,
                        'username' => $req->username,
                        'email' => $req->email,
                        'contact' => $req->contact,
                        'address' => $req->address
                    ]);
            
        return redirect()->route('profileView', $id);
    }
}
