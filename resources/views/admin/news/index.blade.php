@extends('layouts.admin')

@section('title')
	Admin Index
@endsection
@section('css')
	<link rel="stylesheet" type="text/css" href="/customs/css/admin/news/css/index.css">
@endsection
@section('content')
	<div class="create-news">
		<div class="container-fluid">
			<div class="row">
				<h3>News</h3>
				<div class="create-group">
					<a href="/admin/create" class="btn btn-default">Create News</a>
				</div>
			</div>
		</div>
	</div>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Body</th>
				<th>Images (Count)</th>
				<th>Groups</th>
				<th>Crated_At</th>
				<th>Updated_At</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($news as $nws)
				<tr>
					<td>{{ $nws->id }}</td>
					<td>{{ $nws->title }}</td>
					<td>{{ $nws->body }}</td>
					<td>{{ sizeOf($nws->images) }}</td>
					<td>
						@foreach ($nws->groups as $group)
							<span class="label label-warning">{{ $group->name }}</span>
						@endforeach
					</td>
					<td>{{ $nws->created_at }}</td>
					<td>{{ $nws->updated_at }}</td>
					<td>
						<div class="action">
							<form action="/admin/{{ $nws->id }}/edit" method="get" accept-charset="utf-8">
								<button type="submit" class="fa fa-pencil-square-o"></button>
							</form>
							<form action="/admin/{{ $nws->id }}" method="post" accept-charset="utf-8">
								{{  csrf_field() }}
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
