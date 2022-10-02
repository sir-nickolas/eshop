<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function categoriesIndex()
    {
        $categories = Category::all();
        return view('admin.categoryIndex', compact('categories'));
    }

    public function viewCategoryInsertForm()
    {
        return view('admin.categoryInsertForm');
    }

    public function insertCategory(Request $request)
    {
        $category = new Category();
        if ($request->file('image')) {

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/category/', $filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return back()->with('success', 'Η κατηγορία προσθέτηκε επιτυχώς!');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin.editCategory', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $path = 'images/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/category/', $filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->update();

        return redirect('view-categories')->with('success', 'Η κατηγορία επεξεργάστηκε επιτυχώς!');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            $path = 'images/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('view-categories')->with('success', 'Η κατηγορία διαγράφηκε επιτυχώς!');
    }
    public function viewProductInsertForm()
    {
        $category = Category::all();
        return view('admin.productInsertForm', compact('category'));
    }

    public function ProductsIndex()
    {
        $products = Product::all();
        return view('admin.productIndex', compact('products'));
    }

    public function insertProduct(Request $request)
    {
        $products = new Product();
        if ($request->file('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/products/', $filename);
            $products->image = $filename;
        }
        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->small_description = $request->input('small_description');
        $products->price = $request->input('price');
        $products->qty = $request->input('qty');
        $products->sku = $request->input('sku');
        $products->save();
        return redirect('view-products')->with('success', "Το προιόν εισήχθην επιτυχώς");
    }

    public function editProduct($id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.editProduct', compact('product', 'category'));
    }

    public function updateProduct(Request $request, $id)
    {
        $products = Product::find($id);
        if ($request->file('image')) {
            $path = 'images/products/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/products/', $filename);
            $products->image = $filename;
        }

        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->small_description = $request->input('small_description');
        $products->price = $request->input('price');
        $products->qty = $request->input('qty');
        $products->sku = $request->input('sku');
        $products->update();
        return redirect('view-products')->with('success', "Το προιόν επεξεργάστηκε επιτυχώς");
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product->image) {
            $path = 'images/products/' . $product->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('view-products')->with('success', 'Το προιόν διαγράφηκε επιτυχώς!');
    }
}