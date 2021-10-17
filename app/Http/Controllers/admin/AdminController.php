<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $admin_Role = Role::where('is_admin' , '1')->get();
        $admin = User::select()
            ->whereIn('role_id' , $admin_Role[1])
            ->orderBy('id' , 'DESC')
            ->paginate(30);
        return view('admin.admin.index' , [
            'admins' => $admin
        ]);
    }

    public function create(){
        $groups = Role::select('id','name')->get();
        return view('admin.admin.create' ,[
            'groups' => $groups
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name'       => 'required|string|max:50',
            'email'      => 'required|string|max:50',
            'password'   => 'required|string|min:5|max:25|confirmed',
            'groups'     => 'required|exists:roles,id',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->groups
        ]);
        $request->session()->flash('success' , 'create user successfuly');
        return redirect( url('dashboard/admins'));
    }


}
