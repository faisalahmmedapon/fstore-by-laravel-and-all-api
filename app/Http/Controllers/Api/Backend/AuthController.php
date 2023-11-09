<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
