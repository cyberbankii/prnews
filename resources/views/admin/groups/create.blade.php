@extends('layouts.admin')

@section('title')
	Create Group
@endsection

@section('content')
	<form action="/admin/groups" method="POST" role="form">
		{{ csrf_field() }}
		<legend>Create Group</legend>
		<div class="form-group">
			<label for="">name</label>
			<input type="text" class="form-control" name="name" placeholder="Group name">
		</div>
		<button type="submit" class="btn btn-primary">Create</button>
	</form>
@endsection