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
        $product = Product::findOrFail($id);
        $request_product = $request->all();
        $request_product['slug'] = Str::slug($request->title);

        if ($image = $request->file('photo')) {
            // Get the current image path for removal
            $oldImagePath = $product->photo;

            // Generate a unique image name
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Define the storage path for the new image
            $imagePath = '/product/';

            // Store the new image and remove the old one
            updateImage($image, $imageName, $imagePath, $oldImagePath);

            // Update the 'photo' field in the request data
            $request_product['photo'] = $imagePath . $imageName;
        } else {
            // If no new image is uploaded, keep the existing image path
            $request_product['photo'] = $product->photo;
        }
        if ($request->status == "on") {
            $request_product['status'] = true;
        }else{
            $request_product['status'] = false;
        }

       $product->update($request_product);

        return response()->json([
            'message' => "Product Create Successfully",
            'product' => $product,
        ]);
    }


    public function destroy(Product $product)
    {
        unlinkThisImage($product->photo);
        $product->delete();

        return response()->json([
            'message' => "Product Delete Successfully",
            'category' => $product,
        ]);
    }
}
