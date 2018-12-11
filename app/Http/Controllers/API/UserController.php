<?php

namespace TUSIMO\Http\Controllers\API;

use TUSIMO\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
}