@extends('layouts.admin')

@section('title')
	Admin Create News
@endsection

@section('content')
    <div class="content">
        <form action="/admin" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <legend><strong>Create Group</strong></legend>
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" name="title" class="form-control" placeholder="อธิบายให้เข้าใจภายใน 50 ตัวอักษร">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" class="form-control" rows="5" placeholder="อธิบายขยายความเพิ่มเติมเกี่ยวกับโปรโมชัน"></textarea>
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
                <label for="images[]">Choose Images</label>
                <input name="images[]" type="file" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection