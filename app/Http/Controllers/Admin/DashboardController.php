<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Product;
use App\Models\Service;
use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects_count' => Project::count(),
            'products_count' => Product::count(),
            'services_count' => Service::count(),
            'messages_count' => Message::count(),
            'unread_messages_count' => Message::unread()->count(),
        ];
        
        $recentMessages = Message::latest()->take(5)->get();
        $recentProjects = Project::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentProjects'));
    }
}
