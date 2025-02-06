<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return response()->json([
            'status'  => 200,
            'message' => 'Task Retrieved Successfully',
            'data'    => ProductResource::collection(resource: $products),
            'meta'    => [
                'current_page'  => $products->currentPage(),
                'next_page_url' => $products->nextPageUrl(),
                'prev_page_url' => $products->previousPageUrl(),
                'per_page'      => $products->perPage(),
                'total'         => $products->total(),
                'last_page'     => $products->lastPage(),
            ],
        ], 200);
    }
    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'category_id' => $request->category_id,
        ]);
        return response()->json([
            'status'  => 200,
            'message' => 'product Created Successfully',
            'data'    => new ProductResource($product),
        ], 200);
    }
}
