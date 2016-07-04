@extends('layouts.dt')
@section('title', 'All System Users')

@section('page-title', 'All System Users')
@section('page-desc', 'All the people who can log into the system')

@section('content')
	@section('widget-title', 'All Users')
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
@endsection