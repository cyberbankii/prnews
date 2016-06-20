@extends('layouts.admin')

@section('title')
	Create Group
@endsection

@section('content')
	<form action="/admin/groups" method="POST" role="form">
		{{ csrf_field() }}
		<legend>Create Group</legend>
		
		@if($errors->any())
			<ul class="alert alert-danger">
				@foreach ($errors->all() as $error)
			      <li>{{ $error }}</li>
			    @endforeach
			</ul>
		@endif
		
		<div class="form-group">
			<label for="name">name</label>
			<input type="text" class="form-control" name="name" placeholder="Group name">
		</div>
		<button type="submit" class="btn btn-primary">Create</button>
	</form>
@endsection