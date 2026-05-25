<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\PricingTier;
use App\Models\Project;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();
        $pricingTiers = PricingTier::active()->ordered()->get();
        
        // Get recent projects (limit to 3 for the services page)
        $recentProjects = Project::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        
        return view('frontend.services', compact('services', 'pricingTiers', 'recentProjects'));
    }
}
