<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;
use App\Image;
use App\Group;
use App\Http\Requests\NewsRequest;

class AdminPRNewsesController extends Controller
{
    public function __construct() {
    	$this->middleware('admin:2');
    }

    public function index() {
        $news = News::all();
        return view('admin.news.index')->withNews($news);
    }
    public function create() {
        $groups = Group::all();
        return view('admin.news.create')->withGroups($groups);
    }

    public function store(NewsRequest $request) {
        $news = new News();
        $news->title = $request->title;
        $news->body = $request->body;
        $news->save();
        foreach ($request->images as $img) {
            $extension = $img->getClientOriginalExtension();
            $filename =  str_random(40).time().'.'.$extension;
            $img->move('images/', $filename);
            
            $image = new Image();
            $image->path = $filename;
            $image->news_id = $news->id;
            $image->save();
        }
       
        $news->groups()->sync($request->groups);
        return redirect('/admin');
    }

    public function edit($id) {
        $news = News::find($id);
        $groups = Group::all();
        return view('admin.news.edit')->withNews($news)->withGroups($groups);
    }

    public function update($id, NewsRequest $request) {
        $news = News::find($id);
        $news->title = $request->title;
        $news->body = $request->body;
        $news->images()->delete();
        $images = null;
        foreach ($request->images as $img) {
            $extension = $img->getClientOriginalExtension();
            $filename =  str_random(40).time().'.'.$extension;
            $img->move('images/', $filename);
            
            $image = new Image();
            $image->path = $filename;

            $images[] = $image;
        }

        $news->images()->saveMany($images);
        $news->save();

        $news->groups()->sync($request->groups);
        return redirect('/admin');
    }

    public function destroy($id) {
        $news = News::find($id);
        $news->delete();
        return redirect()->back();
    }
}
