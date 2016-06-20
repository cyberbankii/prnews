@extends('layouts.admin')

@section('title')
	Edit News
@endsection

@section('content')
	<div class="content">
        <form action="/admin/{{ $news->id }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <legend><strong>Edit News</strong></legend>
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" name="title" class="form-control" value="{{ $news->title }}">
                <input type="hidden" name="_method" value="PUT">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" class="form-control" rows="5" >{{ $news->body }}</textarea>
                <input type="hidden" name="_method" value="PUT">
            </div>
            <div class="form-group">
                <label for="groups">Groups</label>
                @foreach ($groups as $group)
                    @if (!$news->hasGroup($group->id))
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="groups[]" value="{{ $group->id }}">
                                <input type="hidden" name="_method" value="PUT">
                                {{ $group->name }}

                            </label>
                        </div>
                    @else
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="groups[]" value="{{ $group->id }}" checked>
                                <input type="hidden" name="_method" value="PUT">
                                {{ $group->name }}
                            </label>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="form-group">
                <label for="images[]">Choose Images</label>
                <input name="images[]" type="file" multiple>
                <input type="hidden" name="_method" value="PUT">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection