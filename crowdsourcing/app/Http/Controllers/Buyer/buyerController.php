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

    public function profile($id,Request $req){
    
        $user = User::find($id);
    	return view('buyer.profile', ['user'=>$user]);
    }

    public function uploadImage($id,Request $req){

    	$img = $req->file('profile_photo');

        if ($img == null) {
          return back()->with('err','Profile Picture is not updated');
        }else{
    	//$file->move('upload', $file->getClientOriginalName());
    	
    	/*$fileName = time().'.'.$img->extension();  */
        $image_name = $img->getClientOriginalName();
   
        $img->move(public_path('uploads'), $image_name);

   
        
    	$user = User::find($id);
    	$user->profile_image =$img->getClientOriginalName();
    	$user->save();

        /*$it = $req->session()->get('user');

        echo $it;*/

        /*foreach ($items as &$item) {
            if ($item['profile_image'] == $id) {
                $item['item_quantity']--;
            }
        }*/
        /*$items = session()->put('user.profile_image',$img->getClientOriginalName());*/
        //$items = $req->session()->get('user');
       /* echo $items;*/

        /*Session::set('items', $items);*/

    	return back()->with('pic_upload','Profile Picture is updated');}
    	//echo "sucesse";//return view('buyer.profile', ['user'=>$user]);
    }

    public function editProfile(Request $req){
        
        $user = $req->session()->get('user');
        return view('buyer.edit_profile', ['user'=>$user]);
    }

    public function updateProfile($id, Request $req){

        $user = User::find($id);

        $user->full_name = $req->full_name;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->contact = $req->contact;
        $user->address = $req->address;
        $user->save();

        return redirect()->route('profile',$user->id)->with('edit_profile','Your Profile is Updated');
    }
}
