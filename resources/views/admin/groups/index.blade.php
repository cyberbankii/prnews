@extends('layouts.admin')

@section('title')
	Admin Groups Index
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="/customs/css/admin/groups/css/index.css">
@endsection

@section('content')
	<div class="create-group">
		<div class="container-fluid">
			<div class="row">
				<h3>Groups</h3>
				<div class="create-group">
					<a href="/admin/groups/create" class="btn btn-default">Create Group</a>
				</div>
			</div>
		</div>
	</div>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Group</th>
				<th>Crated_At</th>
				<th>Updated_At</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($groups as $group)
			<tr>
				<td>{{ $group->id }}</td>
				<td>{{ $group->name }}</td>
				<td>{{ $group->created_at }}</td>
				<td>{{ $group->updated_at }}</td>
				<td>
					<div class="action">
						<form action="/admin/groups/{{ $group->id }}/edit" method="get" accept-charset="utf-8">
							<button type="submit" class="fa fa-pencil-square-o"></button>
						</form>
						<form action="/admin/groups/{{ $group->id }}" method="post" accept-charset="utf-8">
							{{ csrf_field() }}
							<button type="submit" class="fa fa-trash"></button>
							<input type="hidden" name="_method" value="DELETE">
						</form>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection