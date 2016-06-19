@extends('layouts.admin')

@section('title')
	Admin Create News
@endsection

@section('content')
	<div class="container">
        <div class="content">
            <form action="/admin" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="header">
                    <h4 class="title">Create News</h4>
                </div>
                <div class="body">
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label">title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" required="required" placeholder="อธิบายให้เข้าใจภายใน 50 ตัวอักษร">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textarea" class="col-sm-2 control-label">Body</label>
                        <div class="col-sm-10">
                            <textarea name="body" id="body" class="form-control" rows="3" required="required" placeholder="อธิบายขยายความเพิ่มเติมเกี่ยวกับโปรโมชัน"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="groups">Groups</label>
                        @foreach ($groups as $group)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="groups[]" value="{{ $group->id }}">
                                    {{ $group->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Choose Images</label>
                        <div class="col-sm-10">
                            <input id="images" name="images[]" type="file" multiple>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
	</div>
@endsection