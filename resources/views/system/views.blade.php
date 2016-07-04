@extends('layouts.dt')
@section('title', 'System Views')

@push('scripts')
	<script src="{{ URL::asset('custom_js/views.js') }}"></script>
@endpush

@section('page-title', 'System Views')
@section('page-desc', 'All the Accessible System Pages')

@section('content')
	@section('widget-title', 'Manage System Views')
		@section('actions')
			<ul class="nav navbar-right panel_toolbox">
				<li>
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-view">
						<i class="fa fa-plus"></i> Add
					</button>
				</li>
				<li>
					<button type="button" id="refresh" class="btn btn-info btn-sm">
						<i class="fa fa-refresh"></i> Refresh
					</button>
				</li>
			</ul>
		@endsection
		
		@if(count($errors) > 0)
			<div class="alert alert-warning">
				<ul>
					@foreach($errors->all() as $error)
						<button class="close" data-dismiss="alert">&times;</button>
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		
		<table class="table jambo_table table-striped table-bordered dt-responsive views-table">
			<thead>
				  <tr>
				    <th>View#</th>
				    <th>Name</th>
				    <th>Url</th>
				    <th>Status</th>
				    <th>Parent</th>
				    <th>Edit</th>
				    <th>Delete</th>
				  </tr>
			 </thead>
			 <tbody>
			</tbody>
		</table>
		
		<div id="add-view" class="modal fade role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      		<div class="modal-dialog">
        		<div class="modal-content">

          			<div class="modal-header">
            			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            			<h4 class="modal-title" id="myModalLabel2"><i class="fa fa-file-code-o"></i> Add System View</h4>
			        </div>
          			<div class="modal-body">

		            	<div id="testmodal2" style="padding: 5px 20px;">
		              		<form id="add_form" class="form-horizontal form-label-left" action="{{ url('/add-view') }}" method="post">
		              			{{ csrf_field() }}
		                		<div class="item form-group">
		                  			<label class="col-sm-3 control-label">Name</label>
		                  			<div class="col-sm-9">
		                    			<input type="text" class="form-control" name="view_name">
		                  			</div>
		                		</div>
		                		
		                		<div class="item form-group">
		                  			<label class="col-sm-3 control-label">Url</label>
		                  			<div class="col-sm-9">
		                    			<input type="text" class="form-control" name="url" required="required"/>
		                  			</div>
		                		</div>
		                		
		                		<div class="item form-group">
		                  			<label class="col-sm-3 control-label">Parent</label>
		                  			<div class="col-sm-9">
		                    			<select name="parent_view" class="form-control select2_single" style="width: 100%;" required="required">
		                    				<option value="NULL">--Choose Parent--</option>
		                    				@foreach($parent_views as $p_view)
		                    					<option value="{{ $p_view->id }}">{{ $p_view->view_name }}</option>
		                    				@endforeach
		                    			</select>
		                  			</div>
		                		</div>
		                		
		                		<div class="modal-footer">
		            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
		            <button type="button" id="add_btn" class="btn btn-primary antosubmit2">Save</button>
		          </div>
              		  		</form>
            			</div>
            			
          			</div>
          			
		          
        		</div>
      		</div>
    </div>
    
    <div id="edit-view" class="modal fade role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      		<div class="modal-dialog">
        		<div class="modal-content">

          			<div class="modal-header">
            			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            			<h4 class="modal-title" id="myModalLabel2"><i class="fa fa-edit"></i> Update System View</h4>
			        </div>
          			<div class="modal-body">

		            	<div id="testmodal2" style="padding: 5px 20px;">
		              		<form id="edit_form" class="form-horizontal calender" role="form" action="{{ url('/add-view') }}" method="post">
		              			{{ csrf_field() }}
		                		<div class="form-group">
		                  			<label class="col-sm-3 control-label">Name</label>
		                  		
		                  			<div class="col-sm-9">
		                    			<input type="text" id="view_name" class="form-control" name="view_name">
		                  			</div>
		                		</div>
		                		
		                		<div class="form-group">
		                  			<label class="col-sm-3 control-label">Url</label>
		                  			<div class="col-sm-9">
		                    			<input type="text" id="url" class="form-control" name="url"/>
		                  			</div>
		                		</div>
		                		
		                		<div class="form-group">
		                  			<label class="col-sm-3 control-label">Parent</label>
		                  			<div class="col-sm-9">
		                    			<select name="parent_view" id="parent" class="form-control select2_single" style="width: 100%;">
		                    				<option value="NULL">--Choose Parent--</option>
		                    				@foreach($parent_views as $p_view)
		                    					<option value="{{ $p_view->id }}">{{ $p_view->view_name }}</option>
		                    				@endforeach
		                    			</select>
		                  			</div>
		                		</div>
              		  		</form>
            			</div>
            			
          			</div>
          			
		          <div class="modal-footer">
		            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
		            <button type="button" id="edit_btn" class="btn btn-primary antosubmit2">Save</button>
		          </div>
        		</div>
      		</div>
    </div>
    
    <div id="del-view" class="modal fade role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      		<div class="modal-dialog">
        		<div class="modal-content">

          			<div class="modal-header">
            			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            			<h4 class="modal-title" id="myModalLabel2"><i class="fa fa-trash"></i> Delete System View</h4>
			        </div>
          			<div class="modal-body">
		            	<p>Are you sure you want to delete the selected view?</p>
          			</div>
          			
		          <div class="modal-footer">
		            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">No</button>
		            <button type="button" id="del_btn" class="btn btn-primary antosubmit2">Yes</button>
		          </div>
        		</div>
      		</div>
    </div>
@endsection