@extends('layouts.dt')
@section('title', 'All System Users')

@section('page-title', 'All System Users')
@section('page-desc', 'All the people who can log into the system')

@section('content')
                  <div class="x_title">
                    <h2>All Users <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                          <p class="text-muted font-13 m-b-30">
                           This is a list of all the currently registered users.
                          </p>

                          <table id="datatable-keytable" class="table table-striped jambo_table table-bordered">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                              </tr>
                            </thead>

                            <tbody>
								@foreach($users as $user)
									<tr>
										<td>{{ $user->id }}</td>
										<td>{{ $user->name }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->created_at }}</td>
									</tr>
								@endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
@endsection