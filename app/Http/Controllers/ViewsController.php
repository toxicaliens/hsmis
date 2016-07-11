<?php

namespace App\Http\Controllers;

use App\View;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Auth\Access\Response;
Use Illuminate\Support\Facades\Validator;

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
	
	public function parentViews(){
		$parent_views = View::WhereNull('parent_id')
			->select('view_name', 'id')
			->get();
		echo $parent_views;
	}
	
	public function getView(Request $request){
		$view = View::find($request->id);
		echo json_encode($view);
	}
	
	public function loadViews(){
		$views = View::all();
		
		$view_count = $views->count();
		if($view_count){
			foreach($views as $view){						
				$view_name = (!empty($view->parent_id)) ? View::find($view->parent_id)->parentView->view_name : '';
				
				$rows[] = array(
					$view->id,
					$view->view_name,
					$view->view_url,
					($view->view_status) ? 'Active': 'Inactive',
					$view_name,
					'<a href="#" class="btn btn-xs btn-warning edit-btn" edit-id="'.$view->id.'" data-toggle="modal" data-target="#edit-view"><i class="fa fa-edit"></i> Edit</a>',
					'<a href="#" class="btn btn-xs btn-danger delete-btn" edit-id="'.$view->id.'" data-toggle="modal" data-target="#del-view"><i class="fa fa-trash"></i> Delete</a>'
				);
				$return['data'] = $rows;
			}
		}else{
			$return['data'] = [];
		}
		echo json_encode($return);
	}
	
	public function store(Request $request){
		$rules = [ 'view_name' => 'required|unique:views|max:255' ];
		$validator = Validator::make($request->all(), $rules);
		
		if($validator->fails()){
			echo json_encode([
					'success' => false,
					'errors' => $validator->getMessageBag()->toArray()
			]);
		}else{
			$view = View::create([
					'view_name' => $request->view_name,
					'view_url' => $request->url,
					 'parent_id' => (!empty($request->parent_view)) ? $request->parent_view : NULL
			]);
			
			$view->save();
			echo json_encode(['success' => true]);
		}
	}
	
	public function update(Request $request){
		$rules = [ 'view_name' => 'required|unique:views,view_name,'.$request->edit_id.'|max:255' ];
		$validator = Validator::make($request->all(), $rules);

		if($validator->fails()){
			echo json_encode([
				'success' => false,
				'errors' => $validator->getMessageBag()->toArray()
			]);
		}else {
			View::where('id', $request->edit_id)
				->update([
					'view_name' => $request->view_name,
					'view_url' => $request->url,
					'parent_id' => (!empty($request->parent_view)) ? $request->parent_view : NULL
				]);

			echo json_encode(['success' => true]);
		}
	}

	public function delete(Request $request){
		View::destroy($request->delete_id);

		echo json_encode(['success' => true]);
	}
}
