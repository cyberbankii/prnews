@extends('layouts.admin')

@section('title')
	Admin Users Index
@endsection

@section('content')
	<div class="container">
		<h3>Users</h3>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created_At</th>
					<th>Updated_At</th>
					<th>Groups</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->created_at }}</td>
						<td>{{ $user->updated_at }}</td>
						<td>
							@foreach ($user->groups as $group)
								<span class="label label-warning">{{ $group->name }}</span>
							@endforeach
						</td>
						<td>
							<div class="action">
								<form action="/admin/users/{{ $user->id }}/edit" method="get" accept-charset="utf-8">
									<button type="submit"><i class="fa fa-pencil-square-o"></i></button>
								</form>
								<form action="/admin/users/{{ $user->id }}" method="post" accept-charset="utf-8">
									{{  csrf_field() }}
									<button type="submit"><i class="fa fa-trash"></i></button>
									<input type="hidden" name="_method" value="DELETE">
								</form>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection