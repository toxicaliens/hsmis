<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

use App\Http\Requests;

class MenuController extends Controller
{
	public function __construct(){
		return $this->middleware('auth');
	}
	
    public function index(){
    	$menu = Menu::all();
    	
    	return view('system.menu', [ 'menu' => $menu ]);
	}
}
