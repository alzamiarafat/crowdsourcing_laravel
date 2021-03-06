<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Dotenv\Validator as DotenvValidator;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
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
            		return redirect()->route('adminDashboard');
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
			'user_roll' => 'string|required'
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

				$user = new User();

				$user->full_name = $req->full_name;
				$user->username = $req->username;
				$user->password = $req->password;
				$user->email = $req->email;
				$user->contact = $req->contact;
				$user->address = $req->address;
				$user->user_roll = strtolower($req->user_roll);

				$user->save();

				return redirect()->route('login');

			}
		}
    }
    
    public function logout(Request $req){

    	$req->session()->flush();
    	return redirect()->route('login');
    }

    public function reset(){
        return view('login.resetPassword', ['title' => 'Reset Password']);
    }

    public function resetSubmit(Request $req){

		try{
			$find = User::where('email', $req->email)->get()[0];

			if($find->email == $req->email){
				$valid = Validator::make($req->all(), [
					
					'password' => 'required|min:6|required_with:repassword|same:repassword',
					'repassword' => 'required|min:6',
					'email' => 'email|required',
					
				]);
				if($valid->fails()){
					return redirect()->route('reset')->withErrors($valid);
				}
				else{
					DB::table('user')
						->where('id', $find->id)
						->update([
							'password' => $req->password
						]);
					return redirect()->route('login');
				}

			}else{
				Session::flash('msg', "Email doesn't matched!");
				return view('login.resetPassword', ['title' => 'Reset Password']);
			}
		}
		catch(Exception $e){
			$req->session()->flash('msg', "Email doesn't matched!");
			return view('login.resetPassword', ['title' => 'Reset Password']);
		}
		
    }
}
