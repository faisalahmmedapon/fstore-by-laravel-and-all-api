<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequestValidation;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest('id')->get();
        if ($products->count() > 0) {
            return response()->json([
                'message' => "All products fetching here",
                'products' => $products,
            ]);
        }
        return response()->json([
            'message' => "Categories not found here",
        ]);
    }


    public function store(ProductStoreRequestValidation $request)
    {
        $request_product = $request->all();
        $request_product['slug'] = Str::slug($request->title);

        $image = $request->file('photo');
        if ($image) {
            // get new image name
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            // send image store location path
            $path = '/product/';
            // store image using function
            storeImage($image, $imageName, $path);
            // save name in database using this code
            $request_product['photo'] = '/product/' . $imageName;

        }
        if ($request->status == "on") {
            $request_product['status'] = true;
        }else{
            $request_product['status'] = false;
        }

        $product = Product::create($request_product);

        return response()->json([
            'message' => "Product Create Successfully",
            'product' => $product,
        ]);
    }


    public function show(string $id)
    {
        //
    }



    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
