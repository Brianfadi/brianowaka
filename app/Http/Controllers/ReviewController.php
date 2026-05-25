<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create()
    {
        $reviews = Review::approved()->latest()->take(6)->get();
        return view('frontend.reviews.create', compact('reviews'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'   => 'required|string|max:100',
            'email'  => 'required|email|max:150',
            'role'   => 'nullable|string|max:150',
            'rating' => 'required|integer|min:1|max:5',
            'body'   => 'required|string|min:10|max:1000',
        ]);

        $data['ip_address'] = $request->ip();
        $data['status']     = 'pending';

        Review::create($data);

        return redirect()->route('reviews.create')
            ->with('success', 'Thank you! Your review has been submitted and is awaiting approval.');
    }
}
