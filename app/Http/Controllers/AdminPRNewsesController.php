<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;
use App\Image;
use App\Group;

class AdminPRNewsesController extends Controller
{
    public function __construct() {
    	// $this->middleware('auth');
    }

    public function index() {
        $news = News::all();
        return view('admin.news.index')->withNews($news);
    }
    public function create() {
        $groups = Group::all();
        return view('admin.news.create')->withGroups($groups);
    }

    public function store(Request $request) {
        $news = new News();
        $news->title = $request->title;
        $news->body = $request->body;
        $news->save();

        $news->groups()->sync($request->groups);

        $images = $request->images;
        foreach ($images as $img) {
            $extension = $img->getClientOriginalExtension();
            $filename =  str_random(40).time().'.'.$extension;
            $img->move('images/', $filename);
            
            $image = new Image();
            $image->path = $filename;
            $image->news_id = $news->id;
            $image->save();           
        }

        return redirect('/admin');
    }

    public function edit($id) {
        $news = News::find($id);
        $groups = Group::all();
        return view('admin.news.edit')->withNews($news)->withGroups($groups);
    }

    public function update($id, Request $request) {
        $news = News::find($id);
        $news->title = $request->title;
        $news->body = $request->body;
        $news->save();

        $news->groups()->sync($request->groups);

        $images = $request->images;
        foreach ($images as $img) {
            $extension = $img->getClientOriginalExtension();
            $filename =  str_random(40).time().'.'.$extension;
            $img->move('images/', $filename);
            
            $image = new Image();
            $image->path = $filename;
            $image->news_id = $news->id;
            $image->save();           
        }
        return redirect('/admin');
    }

    public function destroy($id) {
        $news = News::find($id);
        $news->delete();
        return redirect()->back();
    }
}
