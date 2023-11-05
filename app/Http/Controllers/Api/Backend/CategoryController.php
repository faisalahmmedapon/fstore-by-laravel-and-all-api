<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequestValidation;
use App\Http\Requests\CategoryUpdateRequestValidation;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('custom_serial_number', 'DESC')->latest('id')->get();
        if ($categories->count() > 0) {
            return response()->json([
                'message' => "All categories fetching here",
                'categories' => $categories,
            ]);
        }
        return response()->json([
            'message' => "Categories not found here",
        ]);

    }

    public function store(CategoryStoreRequestValidation $request)
    {

        $request_category = $request->all();
        $request_category['slug'] = Str::slug($request->name);

        $image = $request->file('photo');
        if ($image) {
            // get new image name
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            // send image store location path
            $path = '/category/';
            // store image using function
            storeImage($image, $imageName, $path);
            // save name in database using this code
            $request_category['photo'] = '/category/' . $imageName;

        }
        if ($request->status == "on") {
            $request_category['status'] = '1';
        }

        $category = Category::create($request_category);

        return response()->json([
            'message' => "Category Create Successfully",
            'category' => $category,
        ]);
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return response()->json([
            'category' => $category,
        ]);
    }


    public function update(CategoryUpdateRequestValidation $request, Category $category)
    {

// Get all data from the request
        $requestCategoryData = $request->all();

// Generate a slug for the category name
        $requestCategoryData['slug'] = Str::slug($request->name);

// Check if an image was uploaded
        if ($image = $request->file('photo')) {
            // Get the current image path for removal
            $oldImagePath = $category->photo;

            // Generate a unique image name
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Define the storage path for the new image
            $imagePath = '/category/';

            // Store the new image and remove the old one
            updateImage($image, $imageName, $imagePath, $oldImagePath);

            // Update the 'photo' field in the request data
            $requestCategoryData['photo'] = $imagePath . $imageName;
        } else {
            // If no new image is uploaded, keep the existing image path
            $requestCategoryData['photo'] = $category->photo;
        }

// Update the 'status' field based on the request data
        if ($request->status == "on") {
            $requestCategoryData['status'] = true;
        }

// Update the category with the modified data
        $category->update($requestCategoryData);

// Return a JSON response
        return response()->json([
            'message' => "Category updated successfully",
            'category' => $category,
        ]);

    }

    public function destroy(Category $category)
    {
        unlinkThisImage($category->photo);
        $category->delete();

        return response()->json([
            'message' => "Category Delete Successfully",
            'category' => $category,
        ]);
    }
}
