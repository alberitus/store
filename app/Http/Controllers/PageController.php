<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\segments;
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

        $segments = segments::all();

        $data = [
            'latestProducts' => $latestProducts,
            'featuredProducts' => $featuredProducts,
            'segments' => $segments,
        ];
    
        return view('landing.index', $data);
    }
}
