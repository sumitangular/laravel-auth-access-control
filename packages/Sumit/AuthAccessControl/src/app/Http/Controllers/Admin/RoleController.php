<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('users')->get();
        return view('auth.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('auth.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles']);
        Role::create(['name' => $request->name]);
        return redirect()->route('roles.index');
    }

    public function assignForm()
    {
        $users = User::all();
        $roles = Role::all();
        return view('auth.roles.assign', compact('users', 'roles'));
    }

    public function assign(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->roles()->sync($request->roles);
        return redirect()->route('roles.index');
    }
}
