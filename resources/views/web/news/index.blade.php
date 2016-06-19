@extends('layouts.default')

@section('title')
	Index
@endsection

@section('content')
	@foreach ($news as $nws)
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $nws->title }}</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-4">
					<div id="carousel-id" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@for ($i = 0; $i < sizeOf($nws->images); $i++)
								@if ($i == 0)
									<li data-target="#carousel-id" data-slide-to="{{ $i }}" class="active"></li>
								@else
									<li data-target="#carousel-id" data-slide-to="{{ $i }}"></li>
								@endif
							@endfor
						</ol>
						<div class="carousel-inner">
							@for ($i = 0; $i < sizeof($nws->images); $i++)
								@if ($i==0)
									<div class="item active">
										<img src="/images/{{ $nws->images[$i]->path }}">
									</div>
								@else
									<div class="item">
										<img src="/images/{{ $nws->images[$i]->path }}">
									</div>
								@endif
							@endfor
						</div>
						<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
						<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
					</div>
				</div>
				<div class="col-md-8">
					<p>{{ $nws->body }}{{ $nws->body }}</p>
					<p>
						@foreach ($nws->groups as $group)
							<span class="label label-warning">{{ $group->name }}</span>
						@endforeach
					</p>
				</div>
			</div>
			<div class="panel-footer">
				<p><strong>Created at </strong>{{ $nws->created_at->diffForHumans() }}</p>
			</div>
		</div>
	@endforeach
@endsection