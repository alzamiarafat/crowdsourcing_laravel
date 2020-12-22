<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class userController extends Controller
{
    public function loginIndex(){
    	return view('login.index');
    }

    public function verifyUser(Request $req){

    	 $validation = Validator::make($req->all(), [
    	 	'username' => 'required',
    		'password' => 'required|min:6'
        ]);

    	if ($validation->fails())
    	{
    		return redirect('/login')->withErrors($validation)->withInput();
    	}
    	else{

        	$user = User::where(['username'=>$req->username,'password'=>$req->password])->first();
       		$req->session()->put('user', $user);

            if (count((array)$user) > 0) 
            {
            	
            	if(strtolower($user->user_roll) == 'admin'){
            		echo "admin";
            	}

            	else if(strtolower($user->user_roll) == 'buyer'){
                	return redirect('dashboard');
            	}
            
            	else if(strtolower($user->user_roll) == 'seller'){
                	echo "seller";
            	}  
        	}
        	else{
    			$req->session()->flash('msg', 'invalid username/password');
    			return redirect('/login');
    		}
    	}
    	
    	
    }
    public function registrationIndex(){
    	return view('registration.index');
    }

    public function registrationSubmit(){
    	return redirect('/login');
    }
    public function logout(Request $req){

    	$req->session()->flush();
    	return redirect('/login');
    }
    public function reset(){
        return view('login.resetPassword');
    }

    public function resetSubmit(){
        return redirect('login');
    }
}
