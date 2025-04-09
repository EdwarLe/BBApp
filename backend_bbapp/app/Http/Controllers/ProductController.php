<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    function store(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->quantity = $request->quantity;
        $product->height = $request->height;
        $product->width = $request->width;
        $product->page_quantity = $request->page_quantity;
        $product->print_type = $request->print_type;
        $product->user_id = $request->user_id;
        $product->save();

        return response()->json($product);
    }

    function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->quantity = $request->quantity;
        $product->height = $request->height;
        $product->width = $request->width;
        $product->page_quantity = $request->page_quantity;
        $product->print_type = $request->print_type;
        $product->user_id = $request->user_id;
        $product->save();

        return response()->json($product);
    }

    function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json('Product deleted successfully', 200);
    }
}
