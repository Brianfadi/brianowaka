<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Review;
use App\Models\Advertisement;
use App\Models\HeroOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::featured()->take(6)->get();
        
        // If no featured projects, show recent published projects
        if ($featuredProjects->count() === 0) {
            $featuredProjects = Project::published()->latest()->take(6)->get();
        }
        $services         = Service::active()->ordered()->take(5)->get();
        $products         = Product::where('is_active', true)->take(3)->get();
        
        // Debug: If no active products, get any products
        if ($products->count() === 0) {
            $products = Product::take(3)->get();
        }
        
        $skills           = Skill::active()->ordered()->take(12)->get();
        $experiences      = Experience::ordered()->take(3)->get();
        $reviews          = Review::approved()->latest()->take(6)->get();
        
        // Get active advertisements for hero section
        $advertisements   = Advertisement::active()->ordered()->get();
        
        // Get active hero offer (only the first active one)
        $heroOffer = HeroOffer::active()->ordered()->first();

        $settings = [
            'site_name'     => Setting::get('site_name',     'Brian Owaka'),
            'hero_title'    => Setting::get('hero_title',    'Full Stack Developer'),
            'hero_subtitle' => Setting::get('hero_subtitle', 'Building amazing digital solutions'),
            'hero_line1'    => Setting::get('hero_line1',    'I Build'),
            'hero_line2'    => Setting::get('hero_line2',    'Powerful Web Systems'),
            'hero_line3'    => Setting::get('hero_line3',    'That Drive Business Growth'),
            'about_section_label'  => Setting::get('about_section_label',  'About Me'),
            'about_heading_suffix' => Setting::get('about_heading_suffix',  'a Full Stack Developer'),
            'about_bio'            => Setting::get('about_bio',             'With experience building real-world systems for businesses, I specialize in creating scalable web applications, business management systems, and digital solutions that drive growth and efficiency.'),
            'about_years_exp'      => Setting::get('about_years_exp',       '5+'),
            'about_status_text'    => Setting::get('about_status_text',     'Open to Work'),
            'about_cta_primary'    => Setting::get('about_cta_primary',     'Learn More About Me'),
            'about_me'      => Setting::get('about_me',      'Passionate developer with expertise in modern web technologies.'),
            'contact_email' => Setting::get('contact_email', 'brian@brianowaka.com'),
            'contact_phone' => Setting::get('contact_phone', '+254 712 345 678'),
            'profile_photo' => $this->getFileUrl(Setting::get('profile_photo')),
            'social_github'  => Setting::get('social_github',  null),
            'social_linkedin'=> Setting::get('social_linkedin', null),
            'social_twitter' => Setting::get('social_twitter',  null),
        ];

        $heroStatsRaw = Setting::get('hero_stats', null);
        if (is_string($heroStatsRaw)) {
            $heroStatsRaw = json_decode($heroStatsRaw, true);
        }
        $heroStats = $heroStatsRaw ?: [
            ['label' => 'Projects Completed',  'value' => '+127',   'percent' => 85],
            ['label' => 'Client Satisfaction', 'value' => '98.5%',  'percent' => 98],
            ['label' => 'Code Quality',        'value' => 'A+',     'percent' => 95],
        ];

        $aboutTags = Setting::get('about_tags', null);
        if (is_string($aboutTags)) $aboutTags = json_decode($aboutTags, true);
        $aboutTags = $aboutTags ?: ['Laravel Expert', 'Full Stack', 'API Builder', 'UI/UX', 'Problem Solver'];

        $aboutStatCards = Setting::get('about_stat_cards', null);
        if (is_string($aboutStatCards)) $aboutStatCards = json_decode($aboutStatCards, true);
        $aboutStatCards = $aboutStatCards ?: [
            ['num' => '5+',   'label' => 'Years Experience'],
            ['num' => '50+',  'label' => 'Projects Done'],
            ['num' => '100%', 'label' => 'Satisfaction'],
        ];

        $aboutServices = Setting::get('about_services', null);
        if (is_string($aboutServices)) $aboutServices = json_decode($aboutServices, true);
        $aboutServices = $aboutServices ?: [
            ['title' => 'Web & System Development', 'desc' => 'Building scalable apps and business systems'],
            ['title' => 'API Design & Integration',  'desc' => 'RESTful APIs connecting your ecosystem'],
            ['title' => 'UI/UX Design',              'desc' => 'Clean, intuitive interfaces users love'],
            ['title' => 'Technical Consulting',      'desc' => 'Architecture planning & code reviews'],
        ];

        return view('frontend.home', compact(
            'featuredProjects', 'services', 'products',
            'skills', 'experiences', 'settings', 'heroStats',
            'aboutTags', 'aboutStatCards', 'aboutServices', 'reviews', 'advertisements', 'heroOffer'
        ))->with('advertisementCards', $advertisements);
    }

    /**
     * Get the full URL for a file stored in the configured disk
     * Works with both local storage and S3
     */
    private function getFileUrl($path)
    {
        if (!$path) {
            return null;
        }

        try {
            $disk = config('filesystems.default');
            
            // For S3, Storage::url() returns the full URL
            if ($disk === 's3') {
                return Storage::disk('s3')->url($path);
            }
            
            // For local/public disk, use the standard URL helper
            return Storage::url($path);
        } catch (\Exception $e) {
            // If there's an error getting the URL, return null
            \Log::error('Error getting file URL: ' . $e->getMessage());
            return null;
        }
    }
}
