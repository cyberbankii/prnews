<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\News;
use App\Group;
use DB;

class PRNewsesController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function index() {
    	$groupIds = $this->getGroupIdsByUser();
    	
   		$newsIds = $this->getNewsIdsByGroupIds($groupIds);

        $news = News::whereIn('id', $newsIds)->orderBy('created_at', 'DESC')->get();
    	
    	return view('web.news.index')->withNews($news);
    }

    private function getGroupIdsByUser() {
    	$groups = Auth::user()->groups()->get();
    	$groupIds = null; 
    	foreach ($groups as $group) {
    		$groupIds[] = $group->id;
    	}

    	return $groupIds;
    }

    private function getNewsIdsByGroupIds($groupIds) {
    	$groupNews = DB::table('group_news')
                    ->whereIn('group_id', $groupIds)->groupBy('news_id')->get();
        $newsIds = null;
        foreach ($groupNews as $gn) {
        	$newsIds[] = $gn->news_id;
        }

        return $newsIds;
    }
}
