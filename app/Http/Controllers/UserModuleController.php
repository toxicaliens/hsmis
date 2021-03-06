<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserModuleController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
    public function index(){
    	$users = User::all();
    	
    	return view('users.index', ['users' => $users]);
	}
}
