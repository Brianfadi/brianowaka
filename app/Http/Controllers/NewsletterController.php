<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please provide a valid email address.',
            ], 422);
        }

        $newsletter = Newsletter::firstOrCreate(
            ['email' => $request->email],
            ['subscribed_at' => now()]
        );

        if ($newsletter->wasRecentlyCreated) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing! You will receive updates about new products.',
            ]);
        } elseif (!$newsletter->is_subscribed) {
            $newsletter->subscribe();
            return response()->json([
                'success' => true,
                'message' => 'Welcome back! You have been re-subscribed to our newsletter.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'This email is already subscribed to our newsletter.',
            ], 409);
        }
    }
}
