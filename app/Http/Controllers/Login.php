<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

class Login extends Controller
{
	public function index()
	{
		return view('login');
	}

	public function loginCheck(Request $req)
	{

		$email = trim($req->email);
		$password = trim($req->password);

		if($email == "" || $password == ""){
			return response()->json(array("result" => "empty"));
		}else{
			$password = md5($password);
			$result = DB::table('users')
			->select('id','name')
			->where('email', $email)
			->where('password', $password)
			->first();

			if($result){
				session()->put('all',$result);
				session()->put('id',$result->id);
				session()->put('name',$result->name);
				return response()->json(array("result" => "success", "name" => $result->name));
			}else{
				return response()->json(array("result" => "fail"));
			}
		}
	}


	public function logout()
	{
		session()->flush();
		return redirect('/login');
	}

	public function noaccess()
	{
		return view('/noaccess');
	}
}
