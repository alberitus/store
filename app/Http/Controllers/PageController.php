<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $latestProducts = product::where('created_at', '>=', now()->subMonths(3))
            ->latest()
            ->take(8)
            ->get();

        $featuredProducts = Product::where('is_featured', 1)
        ->latest()
        ->take(8)
        ->get();

        $data = [
            'latestProducts' => $latestProducts,
            'featuredProducts' => $featuredProducts,
        ];
    
        return view('index', $data);
    }
}
