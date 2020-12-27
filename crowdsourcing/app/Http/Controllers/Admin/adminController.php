<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function dashboard(){

        $getBuyers = User::where('user_roll', 'buyer')->get()->count();
        $getSellers = User::where('user_roll', 'seller')->get()->count();
        $getLastJoinedPeople = User::latest('created_at')->get()->count();

        
        $dashboardData = [
            'title' => 'Admin',
            'buyersCount' => $getBuyers,
            'sellersCount' => $getSellers,
            'newJoined' => $getLastJoinedPeople,
        ];

        return view('admin.dashboard', $dashboardData);
    }
}
