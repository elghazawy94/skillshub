<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class GroupController extends Controller
{
    public function index(){
        $groups = Role::select()->get();
        return view('admin.groups.index' ,[
            'groups' => $groups
        ]);
    }

    public function create(){
        return view('admin.groups.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'       => 'required|string|max:50',
            'role'      => 'required|in:0,1',
        ]);
        Role::create([
            'name' => $request->name,
            'is_admin' => $request->role,
        ]);
        $request->session()->flash('success' , 'create groups successfuly');
        return redirect( url('dashboard/groups'));
    }

}
