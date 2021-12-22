<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Models\Category;
use App\Http\Resources\Category as CategoryResource;
use App\Models\Product;
use App\Http\Resources\Product as ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryController extends Controller
{
    //

    public function index()
    {
        return Category::all();
    }
    public function show(Category $category)
    {
        return response()->json(new CategoryResource($category),200);
    }

    public function showProducts(Category $category)
    {
        return new ProductCollection($category->products);

    }

    public function showProduct(Category $category, Product $product)
    {
        $product = $category->products()->where('id', $product->id)->firstOrFail();
        return response()->json(new ProductResource($product),200);
    }



    public function store (Request $request)
    {

        $category= Category::create($request->all());

        return  response()->json($category,201);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return response()->json($category,200);
    }

    public function delete(Category $category)
    {
        $category->delete();
        return response()->json(null,204);
    }
}
