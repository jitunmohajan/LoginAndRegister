<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Sample;
class HomeController extends Controller
{
	public function index(){
		return view('frontend.index');
	}
    public function login(){
    	return view('frontend.login');
    }
    public function postlogin(Request $req){
    	$email=$req->email;
    	$password=$req->password;
    	$obj=Sample::where('email','=',$email)
    			 ->where('password','=',$password)
    			 ->first();
    	if($obj){
    		Session::put('id',$obj->id);//this pass the variable
    		return redirect('index');
    	}
    	else 
    		return "wrong";		 
    }
    public function logout(Request $req)
    {
    	$req->session()->flush();
    	return redirect('/');
    	
    }

    public function register(){
    	return view('frontend.register');
    }

    public function store(Request $req){


    	 $validatedData = $req->validate([
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email|unique:samples,email',
        'password' => 'required',
    	]);
    	$obj=new Sample();
    	$obj->fname=$req->fname;
    	$obj->lname=$req->lname;
    	$obj->email=$req->email;
    	$obj->password=$req->password;
    	

    	if($obj->save()){
    		return view('frontend.login');
    	}

}

}
/*
if($req->email=="admin@gmail.com")
	

*/