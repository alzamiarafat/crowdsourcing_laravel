<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class buyerController extends Controller
{
   public function dashboardIndex(Request $req){
   		
   		
   			$user = $req->session()->get('user');
    		return view('layout.mainLayout', ['user'=>$user]);
    	
    }

    public function profile(Request $req){
    	$user = $req->session()->get('user');
    	//echo $name->username;
    	return view('dashboard.profile', ['user'=>$user]);
    }
}
