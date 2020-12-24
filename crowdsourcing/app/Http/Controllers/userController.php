<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class userController extends Controller
{
    public function loginIndex(){
    	return view('login.index', [ 'title' => 'Login']);
    }

    public function verifyUser(Request $req){

    	$validation = Validator::make($req->all(), [
    	 	'username' => 'required',
    		'password' => 'required|min:6'
        ]);

    	if ($validation->fails())
    	{
    		return redirect()->route('login')->withErrors($validation)->withInput();
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
            		 //$token = $req->session()->token();
            		  $tokn = csrf_token();
            		 echo $tokn;
                	return redirect()->route('dashboard');
            	}
            
            	else if(strtolower($user->user_roll) == 'seller'){
                	echo "seller";
            	}  
        	}
        	else{
    			$req->session()->flash('msg', 'Invalid Username/Password');
    			return redirect()->route('login');
    		}
    	}
    	
    	
    }
    public function registrationIndex(){
    	return view('registration.index', [ 'title' => 'Regostration']);
    }

    public function registrationSubmit(){
    	return redirect()->route('login');
    }
    
    public function logout(Request $req){

    	$req->session()->flush();
    	return redirect()->route('login');
    }

    public function reset(){
        return view('login.resetPassword');
    }

    public function resetSubmit(){
        return redirect()->route('login');
    }
}
