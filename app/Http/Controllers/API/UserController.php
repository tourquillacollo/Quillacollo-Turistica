<?php

namespace TUSIMO\Http\Controllers\API;

use TUSIMO\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use TUSIMO\User;
use TUSIMO\Role;

class UserController extends Controller
{
    public function index()
    {
        $userRole = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->select('users.*', 'roles.name')
                ->get();
        return response() -> json([
            "success" => true,
            "users" => $userRole
        ], 200);
    }

    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        $role_user = Role::where('name', $request->get('role'))->first();
        $user->roles()->attach($role_user);

        return response()->json('User successfully added');
    }

    public function show($id)
    {
        $sql = "SELECT u.id, u.name, u.email, u.password, r.name role
                FROM users u, role_user ru, roles r
                WHERE u.id = ru.user_id AND
                      r.id = ru.role_id
                      AND u.id = ?
                ";
        $users = DB::select($sql, array($id));

        return response() -> json([
            "success" => true,
            "users" => $users
        ], 200);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();
    }

    public function delete($id) {
        $user = User::find($id);

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully!'
        ], 200);
    }
}