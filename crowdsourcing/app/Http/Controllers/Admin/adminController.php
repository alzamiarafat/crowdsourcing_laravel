<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminHistory;
use App\Models\Category;
use App\Models\User;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Validator;
use PDF;

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

    public function deleteUser($id){
        $data = [
            'title' => 'Sure',
            'opearation' => 'Delete',
            'id' => $id
        ];
        return view('admin.sure', $data);
    }

    public function deleteSure($id){
        $history = new AdminHistory();

        $history->admin_id = Session::get('user')->id;
        $history->operation = 'delete';
        $history->user_id = $id;
        $history->user_roll = DB::table('user')->where('id', $id)->select('user_roll')->get()[0]->user_roll;

        $history->save();

        DB::table('user')
                    ->where('id', $id)
                    ->delete();

        return redirect()->route('adminDashboard');
    }

    public function addAdmin(){
        $data = [
            'title' => 'Add Admin'
        ];
        return view('admin.addAdmin', $data);
    }

    public function AddAdminPost(Request $req){
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
        //  checking vlidation
        if($valid->fails()){
            return redirect()->route('Addadmin')->withErrors($valid)->withInput();
        }else{
            // validation user_roll admin or not!
            if(strtolower($req->user_roll) == 'buyer' || strtolower($req->user_roll) == 'seller'){
                $req->session()->flash('err', "Please register only Admin");
                return redirect()->route('Addadmin')->withInput();
            }else{
                
                // adding to user table a new admin user
                $user = new User();

                $user->full_name = $req->full_name;
				$user->username = $req->username;
				$user->password = $req->password;
				$user->email = $req->email;
				$user->contact = $req->contact;
				$user->address = $req->address;
                $user->user_roll = strtolower($req->user_roll);
                
                $user->save();

                // getting id of the new saved admin
                $record = DB::table('user')->where(['username' => $req->username, 'password' => $req->password, 'user_roll' => 'admin'])->first();

                // saving the record to admins perform to admins_history table
                $history = new AdminHistory();

                $history->admin_id = Session::get('user')->id;
                $history->operation = 'added';
                $history->user_id = $record->id;
                $history->user_roll = 'admin';

                $history->save();

                return redirect()->route('adminDashboard');

            }
        }

        return $req->input();
    }

    public function adminHistory($id, Request $request){

        try{
            $client = new \GuzzleHttp\Client();

            $url = "http://localhost:8080/get_activity/admin/".$id;

            $response = $client->request('GET', $url);

            // return [
            //     'status-Code' => $response->getStatusCode(),
            //     'content-type' => $response->getHeaderLine('content-type'),
            //     'body' => $response->getBody()
            // ];

            $activity = json_decode($response->getBody(), true);
            
            if(empty($activity)){
                $data = [
                    'title' => "Activity",
                    'activities' => [],
                    'admin' => ucfirst(DB::table('user')->where('id', $id)->select('username')->get()[0]->username)
                ];
                $request->session()->flash('history', "There is no history of this Admin yet!");
                return view('admin.adminActivity', $data);
            }
            else{
                $data = [
                    'title' => "Activity",
                    'activities' => $activity,
                    'admin' => ucfirst(DB::table('user')->where('id', $id)->select('username')->get()[0]->username)
                ];
                return view('admin.adminActivity', $data);
            }
        } catch(GuzzleException $e){
            $data = [
                'title' => "Activity",
                'activities' => [],
                'admin' => ucfirst(DB::table('user')->where('id', $id)->select('username')->get()[0]->username)
            ];
            $request->session()->flash('error', " Sorry the server not found!");
            return view('admin.adminActivity', $data);
        }
        
    }

    public function seeCategory(){
        
        $categories = Category::get();

        $data = [
            'title' => 'Categories',
            'topic' => 'see_category',
            'categories' => $categories
        ];

        return view('admin.category', $data);
    }

    public function addCategory(){

        $data = [
            'title' => 'Category Add',
            'topic' => 'add_category',
            'categories' => []
        ];

        return view('admin.category', $data);
    }

    public function add_New_Category(Request $req){

        $check = Validator::make($req->all(), [
            'category_name' => ' min:10 | required | regex:/^[\pL\s\-\/]+$/u | string'
        ]);

        if($check->fails()){
            return redirect()->route('addingCategory')->withErrors($check);
        }else{

            // Add category to category table
            $category = new Category();

            $category->category_name = $req->category_name;
            
            $category->save();

            // adding admin_history table
            $history = new AdminHistory();

            $history->admin_id = Session::get('user')->id;
            $history->operation = 'category '. $req->category_name .' added';

            $history->save();

            return redirect()->route('seeCategory');
        }

    }

    public function adminList(){

        $getAdmins = DB::table('user')->where('user_roll', 'admin')->get();


        $data = [
            'title' => 'Admins List',
            'topic' => 'admin_list',
            'admins' => $getAdmins
        ];
        return view('admin.list', $data);
    }

    public function buyerList(){

        $getBuyers = DB::table('user')->where('user_roll', 'buyer')->get();
    
        $data = [
            'title' => 'Buyer List',
            'topic' => 'buyer_list',
            'buyers' => $getBuyers
        ];
        return view('admin.list', $data);
    }

    public function sellerList(){
        $getSellers = DB::table('user')->where('user_roll', 'seller')->get();

        $data = [
            'title' => 'Seller List',
            'topic' => 'seller_list',
            'sellers' => $getSellers
        ];
        return view('admin.list', $data);
    }

    public function History($id){

        $user = User::find($id);

        if($user->user_roll == 'buyer'){
            try{

                // join query
                $history = DB::table('user')
                ->join('post_table', 'user.id', '=', 'post_table.buyer_id')
                ->join('account', 'user.id', '=', 'account.user_id')
                ->join('seller', 'seller.seller_id', '=', 'post_table.seller_id')
                ->where('user.id', $id)
                ->select('user.full_name', 'user.email', 'user.contact', 'user.address', 'post_table.title', 'post_table.post_body', 'post_table.amount', 'seller.seller_name', 'seller.seller_id', 'seller.category_name', 'seller.contact', 'seller.created_at', 'account.net_balance', 'account.deposit', 'account.withdraw')
                ->get();
            
                
                $data = [
                    'title' => 'History',
                    'topic' => $user->user_roll,
                    'who' => $history[0]->full_name,
                    'histories' => $history
                ];
                return view('admin.history', $data);
            }
            catch(Exception $e){
                $data = [
                    'title' => 'History',
                    'topic' => $user->user_roll,
                    'who' => $user,
                    'histories' => [],
                ];
                // return $data['who']->full_name;
                return view('admin.history', $data);
            }
        }
        elseif($user->user_roll == 'seller'){
            // try Catch
            try{
                $history = DB::table('seller')
                        ->join('user', 'seller.buyer_id', '=', 'user.id')
                        ->join('post_table', 'post_table.seller_id', '=', 'seller.seller_id')
                        ->where('seller.seller_id', $id)
                        ->get();
                // return $history;
                $data =[
                    'title' => 'Historty',
                    'topic' => $user->user_roll,
                    'who' => $user,
                    'histories' => $history
                ];
                return view('admin.history', $data);
            }
            catch(Exception $e){
                $data = [
                    'title' => 'History',
                    'topic' => $user->user_roll,
                    'who' => $user,
                    'histories' => [],
                ];
                // return $data['who']->full_name;
                return view('admin.history', $data);
            }
        }        

    }

    public function downladPDF(){
        $data = Session::get('user');

        $pdf = PDF::loadview('admin.profileInformation', compact('data'));

        return $pdf->download('profile.pdf');

        // return view('admin.profileinformation', ['data' => $data]);
    }

    public function searchFunction(Request $req){

        if($req->has('q')){
            $q = $req->q;
            $result = User::where('username','LIKE','%'.$q.'%')->get();
            return response()->json(['data' => $result]);
        }
        else{
            return "not coming";
        }

    }
}
