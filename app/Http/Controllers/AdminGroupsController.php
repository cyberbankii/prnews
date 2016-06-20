<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Group;
use App\Http\Requests\GroupRequest;

class AdminGroupsController extends Controller
{
    public function __construct() {
    	$this->middleware('admin:2');
    }

    public function index() {
        $groups = Group::all();
    	return view('admin.groups.index')->withGroups($groups);
    }

    public function create() {
    	return view('admin.groups.create');
    }

    public function store(GroupRequest $request) {
        Group::create($request->all());
        return redirect('/admin/groups');
    }

    public function edit($id) {
        $group = Group::find($id);
    	return view('admin.groups.edit')->withGroup($group);
    }

    public function update($id, GroupRequest $request) {
        $group = Group::find($id);
        $group->name = $request->name;
        $group->save();
    	return redirect('/admin/groups');
    }

    public function destroy($id) {
        Group::find($id)->delete();

    	return redirect('/admin/groups');
    } 
}
