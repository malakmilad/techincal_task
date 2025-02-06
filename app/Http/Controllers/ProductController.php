<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::get();
        return view('admin.product.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id
        ]);
        return response()->json([
            'status' => 'success',
            'redirect' => route('product.index'),
            'success' => 'Product created successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);
        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity
        ]);
        return redirect()->route('product.index')->with(key: ['success'=>'product updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return redirect()->route('product.index')->with(key: ['success'=>'product deleted successfully']);
    }
    public function filter($amount)
    {
        return Product::where('price', '>', $amount)->get();
    }
}
