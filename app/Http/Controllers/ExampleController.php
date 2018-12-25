<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
// use \Illuminate\Http\Response;
class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 
	 //menggunakan middleware di dalam controller
    public function __construct()
    {
		/* 
		=> keyword only untuk implementasi middleware hanya pada method getUser
		=> keyword except untuk implementasi middleware ke semua method di controller kecuali pada method getUser
		 */
        // $this->middleware('age',['except' =>['getUser']]);
    }
	
	public function generateKey(){
		return str_random(32);
	}
    //
	
	public function fooExample(){
		return 'Example Controller from POST REQUEST';
	}
	
	public function getUser($id){
		return 'User id = ' . $id;
	}
	
	public function getPost($cat1,$cat2){
		return 'Category 1 = ' . $cat1 . ' Category 2 = ' . $cat2;
	}
	
	public function getProfile(){
		echo "ini adalah link profile action ";
		echo '<a href="'.route('profile.action').'">Profile Action</a>';
	}
	public function getProfileAction(){
		return 'Route Profile Action : '.route('profile');
	}
	
	public function fooBar(Request $request){
		
		/* if($request->is('foo/bar')){
			return 'Succes';
		}else{
			return 'Fail';
		} */
		// return $request->path();
		
		return $request->method();
		
	}
	
	public function userProfile(Request $request){
		//penggunaan mengambil nilai dari metode post dengan postman untuk nilai tertentu atau semua nilai 
		// return $request->name;
		// $user['name'] = $request->name;
		// $user['username'] = $request->username;
		// $user['email'] = $request->email;
		// $user['password'] = $request->password;
		
		// return $user;
		
		// return $request->all();
		
		// return $request->input('name','John Doe');// mengambil nilai default
		
		
		/* if($request->has('name')){
			return 'Succes';
		}else{
			return 'Fail';
		} */
		
		/* if($request->has(['name','email'])){
			return 'Succes';
		}else{
			return 'Fail';
		} */
		
		/* if($request->filled(['name','email'])){
			return 'Succes';
		}else{
			return 'Fail';
		} */
		
		// return $request->only(['username','password']);
		
		return $request->except(['username','password']);
	}
	
	/* public function response(){
		//menggunakan class response yg telah tersedia
		
		$data['status'] = 'Data Succesful Created!';
		//walaupun header dihapus tidak ada pengaruh pada pembacaan data karena secara default data akan dikirimkan dengan tipe data json dr class response
		return (new Response($data,201))
			->header('Content-Type','application/json');
	} */
	
	// jika menggunakan helper response tanpa menggunkan class Response maka comment bagian use \Illuminate\Http\Response; 
	
	public function response(){
		//menggunakan class response yg telah tersedia
		
		// $data['status'] = 'Data Succesful Created!';
		//walaupun header dihapus tidak ada pengaruh pada pembacaan data karena secara default data akan dikirimkan dengan tipe data json dr class response
		
		// return response($data,201)->header()->header()->header()->header(); // chain method untuk pemanggilan header yg lebih dari 1
		
		return response()->json([
			'message' => 'Fail! Not Found!',
			'status' => false
		],404);
	}

}
