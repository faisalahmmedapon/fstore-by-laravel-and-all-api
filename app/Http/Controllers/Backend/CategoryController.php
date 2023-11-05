<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::orderBy('custom_serial_number','DESC')->latest('id')->get();
        return view('backend.categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function  show(string $id)
    {
//        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories',
            'custom_serial_number' => 'unique:categories',
            'photo' => 'required|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator){
            $category = new Category();
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->custom_serial_number = $request->custom_serial_number;
            $image = $request->file('photo');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/category/'), $imageName);
                $category->photo = '/category/' . $imageName;
            }
            if ($request->status == "on"){
                $category->status = '1';
            }
            $category->save();
            return redirect()->route('categories.index');
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return response()->json([
            'status' => '200',
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->custom_serial_number = $request->custom_serial_number;
        $image = $request->file('photo');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/category/'), $imageName);
            $category->photo = '/category/' . $imageName;
        }
        $category->status = '1';
        $category->save();
        return response()->json([
            'status' => '200',
            'message' => 'new category upload successfully',
            'category' => $category,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
