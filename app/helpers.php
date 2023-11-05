<?php

use App\Models\Doctor;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

if (!function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (!function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (!function_exists('user_redirect_by_role')) {

    function user_redirect_by_role()
    {
        if (!Auth::user()->hasRole("user")) {
            return view('backend.dashboard.dashboard');
        } else {

            if (Auth::user()->status == 'inactive'){
                Auth::guard('web')->logout();

                $notification = array(
                    'message' => 'We are sorry to inform you that your account is suspend,Please contact with customer care!',
                    'alert-type' => 'warning'
                );

                return redirect('/')->with($notification);
            }else{
                return redirect('/');
            }
        }
    }
}


if (!function_exists('password_hash_make')) {
    function password_hash_make($password)
    {
        return Hash::make($password);
    }
}


if (!file_exists('get_data_by_key')) {
    function get_data_by_key($get_data_by_key)
    {
        return Setting::where('key', $get_data_by_key)->select('value')->pluck('value')->first();

    }
}
if (!file_exists('doctor_name')) {

    function doctor_name($slug)
    {
        return Doctor::where('slug', $slug)->first();
    }
}


if (!file_exists('age')) {

    function age($age)
    {
        return Carbon::parse($age)->age;
    }
}

if (!file_exists('storeImage')){
    function storeImage($image,$imageName,$path){
        $image->move(public_path($path), $imageName);
    }
}
if (!file_exists('updateImage')){
    function updateImage($image,$imageName,$path,$unlink_this_image){
        $image->move(public_path($path), $imageName);
        unlinkThisImage($unlink_this_image);
    }
}

if (!file_exists('unlinkThisImage')){
    function unlinkThisImage($path){
        $file_path = public_path($path);
        if (file_exists($file_path)) {
            @unlink($file_path);
        }
    }
}

