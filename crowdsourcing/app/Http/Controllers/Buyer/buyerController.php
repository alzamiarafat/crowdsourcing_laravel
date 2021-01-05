<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PostTable;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\GuzzleException;

use Dotenv\Validator as DotenvValidator;
use Validator;

use PDF;


class buyerController extends Controller
{
   public function dashboardIndex(Request $req){

        $available_post = PostTable::where('status', 'Available')->get();
        $unavailable_post = PostTable::where('status', 'Unavailable')->get();
        $sellers = Seller::all();
        $own_post = PostTable::where('buyer_name', $req->Session()->get('user')->full_name)->get();


        $posts = DB::table('post_table')
            ->join('user', 'post_table.buyer_id', '=', 'user.id')
            ->get();


        // $posts= PostTable::all();
        //echo $posts;

    	return view('buyer.dashboard',[
            'posts'=>$posts,
            'available_post'=>$available_post->count(),
            'unavailable_post'=>$unavailable_post->count(),
            'sellers'=>$sellers->count(),
            'own_post'=>$own_post->count()

        ]);
    }

    public function profile($id,Request $req){
    
        $user = User::find($id);
    	return view('buyer.profile', ['profile'=>$user]);
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

    public function editProfile($id,Request $req){
        
        $user = User::find($id);
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
    public function postList(Request $req){
        $user = $req->session()->get('user');
        // $user = User::find($id);
        $posts = PostTable::where('buyer_id', $user->id)
        ->get();
        //echo $posts;
        //echo gettype($posts);
        return view('buyer.post_list', ['posts'=>$posts]);
    }

    public function sellerList(Request $req){
        
        // $user = User::find($id);
       
        $sellers = Seller::all();
        return view('buyer.seller_list', ['sellers'=>$sellers]);
    }
    
    public function createPostIndex(Request $req){
        
        // $user = User::find($id);
        
        return view('buyer.post_create');
    }

    public function postEdit($id, Request $req){
        
        //echo $id;
        $find_post = PostTable::find($id);

        //echo $find_post;
        
        return view('buyer.post_edit',['find_post'=>$find_post]);
    }

    public function postUpdate($id,Request $req)
    {
        $post_edit = PostTable::find($id);

        $validation = Validator::make($req->all(), [
            'title' => 'min:3|required|max:100|string',
            'status' => 'string|required',
            'post_body'=>'min:10|required|max:50|string'
        ]);

        if ($validation->fails())
        {
            return redirect()->route('create_post')->withErrors($validation)->withInput();
        }else{

        $post_edit = new PostTable();

        $post_edit->buyer_id   = $req->buyer_id;
        $post_edit->buyer_name =$req->buyer_name;
        $post_edit->title      = $req->title;
        $post_edit->post_body  = $req->post_body;
        $post_edit->status     = $req->status;
        $post_edit->amount     = $req->amount;
        
        $createPost->save();
         return redirect()->route('post_list')->with('update_post','update');
     }

    }

    public function createPost(Request $req){

        $validation = Validator::make($req->all(), [
            'title' => 'min:3|required|max:100|string',
            'status' => 'string|required',
            'post_body'=>'min:10|required|max:50|string'
        ]);

        if ($validation->fails())
        {
            return redirect()->route('create_post')->withErrors($validation)->withInput();
        }else{

        $createPost = new PostTable();

        $createPost->buyer_id   = $req->buyer_id;
        $createPost->buyer_name =$req->buyer_name;
        $createPost->title      = $req->title;
        $createPost->post_body  = $req->post_body;
        $createPost->status     = $req->status;
        $createPost->amount     = $req->amount;
        
        $createPost->save();
         return redirect()->route('post_list')->with('create_post','Post inserted');
     }
    }
    public function postDelete($id,Request $req){
        
        //$user = PostTable::find($id);
        $user = PostTable::where(['id'=>$req->id])->delete();
        $user = $req->session()->get('user');
        $posts = PostTable::all();
        return redirect()->route('post_list')->with('post_delete','Your Profile is Updated');
    }

    public function postAvailable($id,Request $req){
        
        $post = PostTable::find($id);

        $post->status   = 'Available';
        $post->save();
        
        return redirect()->route('post_list');
    }

    public function postUnavailable($id,Request $req){
        
        $post = PostTable::find($id);

        $post->status   = 'Unavailable';
        $post->save();
        return redirect()->route('post_list');
        
        //$user = $req->session()->get('user');
       // $posts = PostTable::all();
        //return view('buyer.post_list', ['posts'=>$posts],['user'=>$user]);
    }

    public function sellerProfile($id,Request $req){
        
        $seller = Seller::find($id);
        $seller_in_userTable = User::find($id);
        
        
        //echo ['suer'=>$user];
        return view('buyer.seller_profile', ['seller'=>$seller],['seller_in_userTable'=>$seller_in_userTable]);
    }

    public function history(Request $req){
        
        //$seller = Seller::find($id);
        //$seller_in_userTable = User::find($id);

        $user = $req->session()->get('user');
        //echo $user;


        $history = DB::table('user')
            ->join('post_table', 'user.id', '=', 'post_table.buyer_id')
            ->join('seller', 'post_table.seller_id', '=', 'seller.seller_id')
            ->where('user.id',$user->id)
            //->select('user.*','post_table.*','seller.*')
            //->select('user.full_name','post_table.title','post_table.status','post_table.post_body','post_table.seller_name','seller.category_name','user.contact','post_table.amount')
            ->get();
        //echo $history;

        return view('buyer.history', ['history'=>$history],['user'=>$user]);
    }

    public function download(Request $req){
        
        $user = $req->session()->get('user');
        $history = DB::table('user')
            ->join('post_table', 'user.id', '=', 'post_table.buyer_id')
            ->join('seller', 'post_table.seller_id', '=', 'seller.seller_id')
            ->where('user.id',$user->id)
            ->get();

        $pdf= PDF::loadview('buyer.pdf',compact('history'));
        return $pdf->download('history.pdf');
    }



    public function search(Request $req)
    {

     if($req->has('q')){
         $q=$req->q;
         $result = User::where('username','LIKE','%'.$q.'%')->orWhere('full_name', 'LIKE','%'.$q.'%')->get();
         return response()->json(['data'=>$result]);
     }else {
        return view('buyer.search');
     }
        
    }

    // public function index(Request $req)
    // {

    //  $user = $req->session()->get('user');
    //  $searchItem= $req->searchItem;
    //     return view('buyer.search', ['user'=>$user]);
    
        
    // }

     public function searchResult(Request $req){

         
        $searchItem= $req->searchItem;
     

        
    //     / return response()->json(['success'=>'Added new records.']);

        try{
            $client = new \GuzzleHttp\Client();

            $url = "http://localhost:8080/get_activity/search/".$searchItem;


            $response = $client->request('GET', $url);
            
            $result = json_decode($response->getBody(), true);
            //$data = $response->getBody();

             if(empty($result)){
                $data = ['results' => []];
                $request->session()->flash('search', "User Not Found!");
                return view('buyer.search', $data);
            }
            else{
                $data = ['results' => $result];
                return view('buyer.search_result', $data);
            }


        
            //return view('buyer.search_result',['data'=>$data]);


            //echo $data->username;
        }
        catch(GuzzleException $e){
        
            $req->session()->flash('error', " Sorry the server not found!");
            return view('buyer.search');
            
        }
    }

    
}
