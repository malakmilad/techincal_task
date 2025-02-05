<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

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
}
