<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    public function index(){
        // user redirect will be by this function using helper function
        return user_redirect_by_role();
    }
}
