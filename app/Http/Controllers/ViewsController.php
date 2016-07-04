<?php

namespace App\Http\Controllers;

use App\View;
use Illuminate\Http\Request;
use App\Http\Requests;

class ViewsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
	}
	
	public function index(){		
		//get parent views
		$parent_views = View::WhereNull('parent_id')
			->select('view_name', 'id')
			->get();
		
		return view('system.views', [ 'parent_views' => $parent_views ]);
	}
	
	public function loadViews(){
		$views = View::all();
		
		foreach($views as $view){						
			$view_name = (!empty($view->parent_id)) ? View::find($view->parent_id)->parentView->view_name : '';
			
			$rows[] = array(
				$view->id,
				$view->	view_name,
				$view->view_url,
				$view->view_status,
				$view_name,
				'<a href="#" class="btn btn-xs btn-warning edit-btn" edit-id="'.$view->id.'" data-toggle="modal" data-target="#edit-view"><i class="fa fa-edit"></i> Edit</a>',
				'<a href="#" class="btn btn-xs btn-danger delete-btn" delete-id="'.$view->id.'" data-toggle="modal" data-target="#del-view"><i class="fa fa-trash"></i> Delete</a>'
			);
			$return['data'] = $rows;
		}
		echo json_encode($return);
	}
	
	public function store(Request $request){
		$this->validate($request, [
			'view_name' => 'required|unique:views|max:255',
			'url' => 'required',
			'parent_view' => 'required'
		]);
		
		$view = View::create([
				'view_name' => $request->view_name,
				'view_url' => $request->url,
		]);
		
		$view->save();
		return redirect('/views');
	}
	
	public function update(Request $request){
		$this->validate($request, [
				'edit_id' => 'required',
				'view_name' => 'required|unique:views|max:255',
				'url' => 'required',
				'parent_view' => 'required'
		]);
		
		$view = View::where('id', $request->edit_id)
			->update([
				'view_name' => $request->view_name,
				'view_url' => $request->url
			]);
	}
}
