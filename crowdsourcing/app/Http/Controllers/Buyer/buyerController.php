<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class buyerController extends Controller
{
   public function dashboardIndex(Request $req){

   		$user = $req->session()->get('user');
    	return view('layout.mainLayout', ['user'=>$user]);
    }

    public function profile(Request $req){
    	
    	$user = $req->session()->get('user');
    	return view('buyer.profile', ['user'=>$user]);
    }

    public function uploadImage($id,Request $req){

    	$img = $req->file('profile_photo');
    	//$file->move('upload', $file->getClientOriginalName());
    	
    	$fileName = time().'.'.$img->extension();  
   
        $img->move(public_path('uploads'), $fileName);
   
        
    	$user = User::find($id);
    	$user->profile_image =$img->getClientOriginalName();
    	$user->save();
    	return back()->with('pic_upload','Profile Picture is Updated');
    	//echo "sucesse";//return view('buyer.profile', ['user'=>$user]);
    }
}
