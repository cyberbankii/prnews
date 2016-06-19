@extends('layouts.admin')

@section('title')
	Edit Create News
@endsection

@section('content')
	<div class="container">
        <div class="content">
            <form action="/admin/{{ $news->id }}" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="header">
                    <h4 class="title">Edit News</h4>
                </div>
                <div class="body">
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label">title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" required="required" value="{{ $news->title }}">
                             <input type="hidden" name="_method" value="PUT">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textarea" class="col-sm-2 control-label">Body</label>
                        <div class="col-sm-10">
                            <textarea name="body" class="form-control" rows="3" required="required">{{ $news->body }}</textarea>
                            <input type="hidden" name="_method" value="PUT">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="groups">Groups</label>
                        @foreach ($groups as $group)
                            @if (!$news->hasGroup($group->id))
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
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Choose Images</label>
                        <div class="col-sm-10">
                            <input id="images" name="images[]" type="file" equired="required" value="{{ $group->images}}" multiple>
                            <input type="hidden" name="_method" value="PUT">
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
	</div>
@endsection