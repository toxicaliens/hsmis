@extends('layouts.dt')
@section('title', 'Routes')

@push('scripts')
	<script src="{{ URL::asset('custom_js/views.js') }}"></script>
@endpush

@section('page-title', 'Routes')
@section('page-desc', 'All the Accessible Routes')

@section('content')
	@section('widget-title', 'Manage System Routes')
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
            			<h4 class="modal-title" id="myModalLabel2"><i class="fa fa-file-code-o"></i> Add Route</h4>
			        </div>
          			<div class="modal-body">
          				<div class="progress add_ps" style="height:10px; display:none;">
                        	<div class="progress-bar progress-bar-info progress-bar-striped active" data-transitiongoal="65" aria-valuenow="65" style="width: 100%; "></div>
                      	</div>
                      	<div class="alert alert-warning" id="add_errors" style="display: none;">
							<ul></ul>
						</div>
						<div class="alert alert-success" id="add_success" style="display: none;">
							<button class="close" data-dismiss="modal">&times;</button>
							<strong>Success!</strong> The Route has been added.
						</div>
						<form action="" method="post" class="form-horizontal" id="add_form">
			            	<div id="testmodal2" style="padding: 5px 20px;">
			              			{{ csrf_field() }}
			                		<div class="form-group">
			                  			<label class="col-sm-3 control-label">Name</label>
			                  			<div class="col-sm-9">
			                    			<input type="text" class="form-control" name="view_name">
			                  			</div>
			                		</div>

			                		<div class="form-group">
			                  			<label class="col-sm-3 control-label">Url</label>
			                  			<div class="col-sm-9">
			                    			<input type="text" class="form-control" name="url"/>
			                  			</div>
			                		</div>

			                		<div class="form-group">
			                  			<label class="col-sm-3 control-label">Parent</label>
			                  			<div class="col-sm-9">
			                    			<select name="parent_view" id="parent_views" class="form-control select2_single" style="width: 100%;"></select>
			                  			</div>
			                		</div>

			                		<div class="modal-footer">
						            	<button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
						            	<button type="submit" class="btn btn-primary antosubmit2">Save</button>
						          </div>
	            			</div>
            			</form>
          			</div>


        		</div>
      		</div>
    </div>

<!-- edit modal -->
<div id="edit-view" class="modal fade role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      		<div class="modal-dialog">
        		<div class="modal-content">

          			<div class="modal-header">
            			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            			<h4 class="modal-title" id="myModalLabel2"><i class="fa fa-edit"></i> Update Route</h4>
			        </div>
          			<div class="modal-body">
          				<div class="progress edit_ps" style="height:10px; display:none;">
                        	<div class="progress-bar progress-bar-info progress-bar-striped active" data-transitiongoal="65" aria-valuenow="65" style="width: 100%; "></div>
                      	</div>
                      	<div class="alert alert-warning" id="edit_errors" style="display: none;">
							<ul></ul>
						</div>
						<div class="alert alert-success" id="edit_success" style="display: none;">
							<button class="close" data-dismiss="modal">&times;</button>
							<strong>Success!</strong> The Route has been updated.
						</div>
						<form action="" method="post" class="form-horizontal" id="edit_form">
			            	<div id="testmodal2" style="padding: 5px 20px;">
								{{ csrf_field() }}
								<div class="form-group">
									<label class="col-sm-3 control-label">Name</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="view_name" name="view_name">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Url</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="url" name="url"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Parent</label>
									<div class="col-sm-9">
										<select name="parent_view" id="ed_parent_views" class="form-control select2_single" style="width: 100%;"></select>
									</div>
								</div>

								{{--hidden fields--}}
								<input type="hidden" name="edit_id" id="edit_id"/>

								<div class="modal-footer">
									<button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary antosubmit2">Save</button>
								</div>
	            			</div>
            			</form>
          			</div>


        		</div>
      		</div>
    </div>

    <div id="del-view" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      		<div class="modal-dialog">
        		<div class="modal-content">
          			<div class="modal-header">
            			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            			<h4 class="modal-title" id="myModalLabel2"><i class="fa fa-trash"></i> Delete System View</h4>
			        </div>
          			<div class="modal-body">
                        <div class="progress edit_ps" style="height:10px; display:none;">
                            <div class="progress-bar progress-bar-info progress-bar-striped active" data-transitiongoal="65" aria-valuenow="65" style="width: 100%; "></div>
                        </div>
                        <div class="alert alert-success" id="del_success" style="display: none;">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <strong>Success!</strong> The Route has been deleted.
                        </div>
                        <form action="" method="post" class="form-horizontal" id="delete_form">
                            <div id="testmodal2" style="padding: 5px 20px;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <p>Are you sure you want to delete the selected record?</p>

                                {{--hidden fields--}}
                                <input type="hidden" name="delete_id" id="delete_id"/>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">No</button>
                                    <button type="submit" id="del_btn" class="btn btn-primary antosubmit2">Yes</button>
                                </div>
        		            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection