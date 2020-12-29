<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function ViewProfile(){
        return "none";
    }

    public function resetPassword(Request $req){



        $resetPassword_data = [
            'title' => 'Reset password',

        ];
        return view('admin.resetPassword', $resetPassword_data);
        // return $id;
    }

    public function changePassword(Request $req){
        return $req->input();
    }
}
