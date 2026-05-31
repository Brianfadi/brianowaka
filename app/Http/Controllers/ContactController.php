<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $service = $request->get('service');
        
        // Get dynamic settings
        $profilePhotoPath = Setting::get('profile_photo');
        $settings = [
            'contact_email' => Setting::get('contact_email', 'brian@brianowaka.com'),
            'contact_phone' => Setting::get('contact_phone', '+254 123 456 789'),
            'contact_location' => Setting::get('contact_location', 'Nairobi, Kenya'),
            'contact_address' => Setting::get('contact_address', 'Available for remote work worldwide'),
            'facebook_url' => Setting::get('facebook_url', '#'),
            'twitter_url' => Setting::get('twitter_url', '#'),
            'github_url' => Setting::get('github_url', '#'),
            'linkedin_url' => Setting::get('linkedin_url', '#'),
            'whatsapp_number' => Setting::get('whatsapp_number', '+254123456789'),
            'response_time' => Setting::get('response_time', '24 hours'),
            'availability' => Setting::get('availability', 'Mon-Fri, 9AM-6PM EAT'),
            'profile_photo' => $profilePhotoPath ? \Illuminate\Support\Facades\Storage::url($profilePhotoPath) : null,
        ];
        
        return view('frontend.contact', compact('service', 'settings'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);
        
        $message = Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
        
        return redirect()->route('contact')
            ->with('success', 'Thank you for your message! I will get back to you soon.');
    }
}
