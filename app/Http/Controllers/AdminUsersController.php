<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Group;

class AdminUsersController extends Controller
{
    public function __construct() {
    	// $this->middleware('auth');
    }

    public function index() {
        $users = User::all();
    	return view('admin.users.index')->withUsers($users);
    }

    public function edit($id) {
        $user = User::find($id);
        $groups = Group::all();
    	return view('admin.users.edit')->withUser($user)->withGroups($groups);
    }

    public function update($id, Request $request) {
        $user = User::find($id);
        $groups = $request->groups;
        
        if($groups == null) {
            return redirect()->back();
        }
        else {
            $user->groups()->sync($groups);
        }
        return redirect('/admin/users');
    }

    public function destroy($id) {
        User::find($id)->delete();
    	return redirect('/admin/users');
    }
}
