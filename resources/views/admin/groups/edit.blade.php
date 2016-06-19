@extends('layouts.admin')

@section('title')
	Admin Edit Group
@endsection

@section('content')
	<div class="container">
		<form action="/admin/groups/{{ $group->id }}" method="POST" role="form">
			<legend>Update Group</legend>
			{{ csrf_field() }}
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" class="form-control" name="name" value="{{ $group->name }}">
				<input type="hidden" name="_method" value="PUT">
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
@endsection
