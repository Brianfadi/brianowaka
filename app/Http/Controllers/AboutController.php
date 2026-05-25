<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $skills = Skill::active()->ordered()->get();
        $experiences = Experience::ordered()->get();
        $educations = Education::ordered()->get();
        
        $settings = [
            'bio' => Setting::get('bio', 'I am a passionate full-stack developer with expertise in modern web technologies.'),
            'education' => Setting::get('education', 'University of Kabianga - Bachelor of Computer Science'),
            'cv_url' => Setting::get('cv_url'),
            'full_name' => Setting::get('full_name', 'Brian Owaka'),
            'professional_title' => Setting::get('professional_title', 'Full Stack Developer'),
            'personal_story' => Setting::get('personal_story', 'My journey into technology began during my university years, where I discovered my passion for building solutions that solve real-world problems. From academic projects to professional applications, I\'ve been dedicated to mastering the art of web development and creating digital experiences that make a difference.'),
            'work_philosophy' => Setting::get('work_philosophy', 'I focus on building scalable and maintainable systems that prioritize user experience and performance. I believe in turning business ideas into working digital solutions through clean code, thoughtful design, and continuous learning.'),
            'achievements' => Setting::get('achievements', json_encode([
                'Completed 50+ professional projects',
                'Built real-world management systems',
                'Worked with diverse clients and companies',
                'Specialized in full-stack development'
            ])),
            'graduation_year' => Setting::get('graduation_year', '2022'),
            'contact_email' => Setting::get('contact_email', 'brian@brianowaka.com'),
            'contact_phone' => Setting::get('contact_phone', '+254 123 456 789'),
            'personal_interests' => Setting::get('personal_interests', 'Technology, Business Innovation, Creative Design, Continuous Learning'),
            'projects_completed' => Setting::get('projects_completed', 50),
            'years_experience' => Setting::get('years_experience', 5),
            'client_satisfaction' => Setting::get('client_satisfaction', 100),
            'technologies_count' => Setting::get('technologies_count', 20),
        ];
        
        $skillsByCategory = $skills->groupBy('category');
        
        // Core services
        $services = [
            [
                'title' => 'Web Application Development',
                'description' => 'Building responsive, scalable web applications using modern frameworks and best practices',
                'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9'
            ],
            [
                'title' => 'Business System Development',
                'description' => 'Creating custom business management systems that streamline operations and increase efficiency',
                'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
            ],
            [
                'title' => 'API Integration',
                'description' => 'Seamlessly integrating third-party APIs and building custom APIs for enhanced functionality',
                'icon' => 'M8 9l3 3-3 3m5.5-3H3m21 0a9 9 0 11-18 0 9 9 0 0118 0z'
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'Creating intuitive, user-friendly interfaces that provide exceptional user experiences',
                'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01'
            ],
            [
                'title' => 'Graphics Design',
                'description' => 'Designing visually appealing graphics and branding materials that communicate your message effectively',
                'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'
            ],
            [
                'title' => 'Database Design',
                'description' => 'Architecting efficient database structures that ensure data integrity and optimal performance',
                'icon' => 'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4'
            ]
        ];
        
        // Decode achievements JSON
        $achievements = json_decode($settings['achievements'], true) ?? [];
        
        return view('frontend.about', compact(
            'skills', 
            'experiences', 
            'educations',
            'settings', 
            'skillsByCategory', 
            'services', 
            'achievements'
        ));
    }
    
    public function downloadCV()
    {
        $cvUrl = Setting::get('cv_url');
        
        if (!$cvUrl) {
            return redirect()->back()->with('error', 'CV not available for download.');
        }
        
        // If it's a full URL, redirect to it
        if (filter_var($cvUrl, FILTER_VALIDATE_URL)) {
            return redirect($cvUrl);
        }
        
        // If it's a storage path, download from storage
        if (Storage::exists($cvUrl)) {
            return Storage::download($cvUrl, 'Brian_Owaka_CV.pdf');
        }
        
        return redirect()->back()->with('error', 'CV file not found.');
    }
}
