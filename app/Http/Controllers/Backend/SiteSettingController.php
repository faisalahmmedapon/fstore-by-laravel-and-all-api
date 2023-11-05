<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:setting-list|setting-create|setting-edit|setting-delete', ['only' => ['index']]);
        $this->middleware('permission:setting-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:setting-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:setting-delete', ['only' => ['destroy']]);
    }

    public function index(){

        $settings = Setting::get(['key', 'value','type']);
        return view('backend.settings.index',compact('settings'));
    }

    public function update(Request $request){

        $data = $request->except('_token');
//return $data;
        foreach ($data as $key => $value) {

            if($request->hasFile('logo')){
                Setting::where('key', $key)->update(['value' => $value]);
            }else{
                Setting::where('key', $key)->update(['value' => $value]);
            }

        }

        return redirect()->back();
    }

}
