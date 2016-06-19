@extends('layouts.admin')

@section('title')
	Admin Edit Group
@endsection

@section('content')
	<div class="container">
		<form action="/admin/users/{{ $user->id }}" method="POST" role="form">
			<legend>Edit User</legend>
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" value="{{ $user->password }}" disabled>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
			</div>
			<div class="form-group">
				<label for="groups">Groups</label>
				@foreach ($groups as $group)
					@if (!$user->hasGroup($group->id))
						<div class="checkbox">
							<label>
								<input type="checkbox" name="groups[]" value="{{ $group->id }}">
								{{ $group->name }}
							</label>
						</div>
					@else
						<div class="checkbox">
							<label>
								<input type="checkbox" name="groups[]" value="{{ $group->id }}" checked>
								{{ $group->name }}
							</label>
						</div>
					@endif
				@endforeach
			</div>
			<input type="hidden" name="_method" value="PUT">
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
@endsection
