<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:dashboard');
        $this->middleware('permission:admin-list|admin-create|admin-edit|admin-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:admin-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:admin-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $admins = User::all();
        return view('backend.admins.index', compact('admins'));
    }


    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('backend.admins.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = password_hash_make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('admins.index')->with('success', 'User created successfully.');
    }


    public function show($id)
    {
        $user = User::find($id);

        return view('backend.admins.show', compact('user'));
    }


    public function edit($id)
    {
        $admin = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $adminRole = $admin->roles->pluck('name', 'name')->toArray();

        return view('backend.admins.edit', compact('admin', 'roles', 'adminRole'));
    }

    public function update(Request $request, $id)
    {

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = password_hash_make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')
            ->where('model_id', $id)
            ->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->route('admins.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('admins.index')->with('success', 'User deleted successfully.');
    }
}
