<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::latest()->paginate(50);
        $subscribedCount = Newsletter::subscribed()->count();
        $totalCount = Newsletter::count();
        
        return view('admin.newsletters.index', compact('newsletters', 'subscribedCount', 'totalCount'));
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();

        return redirect()->route('admin.newsletters.index')
            ->with('success', 'Newsletter subscription deleted successfully.');
    }

    public function export()
    {
        $newsletters = Newsletter::subscribed()->get();
        
        $csv = "Email,Subscribed At\n";
        foreach ($newsletters as $newsletter) {
            $csv .= "\"{$newsletter->email}\",\"{$newsletter->subscribed_at}\"\n";
        }
        
        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="newsletter-subscribers-' . date('Y-m-d') . '.csv"');
    }
}
