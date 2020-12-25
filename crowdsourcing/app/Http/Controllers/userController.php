<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Dotenv\Validator as DotenvValidator;
use Validator;

use function PHPSTORM_META\type;

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
    	return view('registration.index', [ 'title' => 'Registration']);
    }

    public function registrationSubmit(Request $req){
		$valid = Validator::make($req->all(), [
			'full_name' => 'min:3|required|max:50|string',
			'username' => 'required|min:3|string',
			'password' => 'required|min:6|required_with:repassword|same:repassword',
			'repassword' => 'required|min:6',
			'email' => 'email|required',
			'contact' => 'required|min:11|max:14',
			'address' => 'string|min:3|required',
			'user_roll' => 'string|required|min:5|max:6'
		]);
		
		if($valid->fails()){
			return redirect()->route('registration')->withErrors($valid)->withInput();
		}
		else{
			if(strtolower($req->user_roll) == 'admin'){
				$req->session()->flash('re-msg', "You can't register as Admin");
				return redirect()->route("registration")->withInput();
			}
			else{
				// echo "saqib";
				return $req->all();

			}
		}
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
