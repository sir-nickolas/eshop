<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $products = Product::where('name', 'LIKE', "%$search%")->orWhere('sku', 'LIKE', "%$search%")
                ->get();
        } else {
            $products = Product::all();
        }
        return view('home', compact('products', 'search'));
    }

    public function viewProductDetails($id)
    {
        $data = Product::find($id);
        return view('productDetails', ['product' => $data]);
    }

    public function viewCategory($id)
    {
        if (Category::where('id', $id)->exists()) {
            $category = Category::where('id', $id)->first();
            $products = Product::where('cate_id', $category->id)->get();
            return view('viewCategory', compact('category', 'products'));
        } else {
            return redirect('/')->with('idNotFound', "Id does not exist");
        }
    }
}
