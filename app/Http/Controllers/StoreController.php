<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->active()->latest()->get();
        $testimonials = Testimonial::active()->ordered()->take(3)->get();
        
        return view('frontend.store', compact('products', 'testimonials'));
    }
    
    public function show(Product $product)
    {
        // Add slug generation if not present
        if (!$product->slug) {
            $product->slug = Str::slug($product->name);
            $product->save();
        }
        
        return view('frontend.store.show', compact('product'));
    }
}
