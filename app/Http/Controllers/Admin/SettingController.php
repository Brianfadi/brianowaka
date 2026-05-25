<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // Defines all known settings with their metadata
    private function schema(): array
    {
        return [
            'general' => [
                'label' => 'General',
                'icon'  => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
                'fields' => [
                    ['key' => 'site_name',        'label' => 'Site Name',        'type' => 'text',     'placeholder' => 'Brian Owaka'],
                    ['key' => 'site_tagline',     'label' => 'Tagline',          'type' => 'text',     'placeholder' => 'Full Stack Developer'],
                    ['key' => 'site_description', 'label' => 'Site Description', 'type' => 'textarea', 'placeholder' => 'A short bio shown in meta tags...'],
                    ['key' => 'hero_line1',       'label' => 'Hero Line 1',      'type' => 'text',     'placeholder' => 'I Build'],
                    ['key' => 'hero_line2',       'label' => 'Hero Line 2 (highlighted)', 'type' => 'text', 'placeholder' => 'Powerful Web Systems'],
                    ['key' => 'hero_line3',       'label' => 'Hero Line 3',      'type' => 'text',     'placeholder' => 'That Drive Business Growth'],
                    ['key' => 'profile_photo',    'label' => 'Profile Photo',    'type' => 'file',     'accept' => 'image/*'],
                    ['key' => 'site_logo',        'label' => 'Site Logo',        'type' => 'file',     'accept' => 'image/*'],
                    ['key' => 'site_favicon',     'label' => 'Favicon',          'type' => 'file',     'accept' => 'image/*'],
                    ['key' => 'cv_url',           'label' => 'CV / Resume',      'type' => 'file',     'accept' => '.pdf,.doc,.docx'],
                ],
            ],
            'contact' => [
                'label' => 'Contact',
                'icon'  => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                'fields' => [
                    ['key' => 'contact_email',   'label' => 'Email Address', 'type' => 'email', 'placeholder' => 'brian@example.com'],
                    ['key' => 'contact_phone',   'label' => 'Phone Number',  'type' => 'text',  'placeholder' => '+254 700 000 000'],
                    ['key' => 'contact_location','label' => 'Location',      'type' => 'text',  'placeholder' => 'Nairobi, Kenya'],
                    ['key' => 'contact_whatsapp','label' => 'WhatsApp Link', 'type' => 'text',  'placeholder' => 'https://wa.me/254700000000'],
                ],
            ],
            'social' => [
                'label' => 'Social',
                'icon'  => 'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1',
                'fields' => [
                    ['key' => 'social_github',   'label' => 'GitHub',    'type' => 'url', 'placeholder' => 'https://github.com/username'],
                    ['key' => 'social_linkedin',  'label' => 'LinkedIn',  'type' => 'url', 'placeholder' => 'https://linkedin.com/in/username'],
                    ['key' => 'social_twitter',   'label' => 'Twitter/X', 'type' => 'url', 'placeholder' => 'https://twitter.com/username'],
                    ['key' => 'social_facebook',  'label' => 'Facebook',  'type' => 'url', 'placeholder' => 'https://facebook.com/username'],
                    ['key' => 'social_instagram', 'label' => 'Instagram', 'type' => 'url', 'placeholder' => 'https://instagram.com/username'],
                    ['key' => 'social_youtube',   'label' => 'YouTube',   'type' => 'url', 'placeholder' => 'https://youtube.com/@username'],
                ],
            ],
            'seo' => [
                'label' => 'SEO',
                'icon'  => 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z',
                'fields' => [
                    ['key' => 'seo_title',       'label' => 'Meta Title',       'type' => 'text',     'placeholder' => 'Brian Owaka — Full Stack Developer'],
                    ['key' => 'seo_description', 'label' => 'Meta Description', 'type' => 'textarea', 'placeholder' => '160 character description for search engines...'],
                    ['key' => 'seo_keywords',    'label' => 'Keywords',         'type' => 'text',     'placeholder' => 'laravel, developer, kenya, web development'],
                    ['key' => 'og_image',        'label' => 'OG Image URL',     'type' => 'text',     'placeholder' => 'https://... (1200×630px recommended)'],
                    ['key' => 'google_analytics','label' => 'Google Analytics ID', 'type' => 'text',  'placeholder' => 'G-XXXXXXXXXX'],
                ],
            ],
            'stats' => [
                'label' => 'Hero Stats',
                'icon'  => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                'fields' => [], // handled separately
            ],
            'about' => [
                'label' => 'About Me',
                'icon'  => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                'fields' => [
                    ['key' => 'about_section_label',    'label' => 'Section Label',         'type' => 'text',     'placeholder' => 'About Me'],
                    ['key' => 'about_heading_suffix',   'label' => 'Heading Suffix',         'type' => 'text',     'placeholder' => 'a Full Stack Developer'],
                    ['key' => 'about_bio',              'label' => 'Bio Text',               'type' => 'textarea', 'placeholder' => 'With experience building real-world systems...'],
                    ['key' => 'about_years_exp',        'label' => 'Years Experience',       'type' => 'text',     'placeholder' => '5+'],
                    ['key' => 'about_status_text',      'label' => 'Status Badge Text',      'type' => 'text',     'placeholder' => 'Open to Work'],
                    ['key' => 'about_cta_primary',      'label' => 'Primary CTA Text',       'type' => 'text',     'placeholder' => 'Learn More About Me'],
                ],
            ],
        ];
    }

    public function index()
    {
        $schema    = $this->schema();
        $settings  = Setting::all()->keyBy('key');
        $activeTab = request('tab', 'general');

        $heroStats = Setting::get('hero_stats', null);
        if (is_string($heroStats)) {
            $heroStats = json_decode($heroStats, true);
        }
        $heroStats = $heroStats ?: [
            ['label' => 'Projects Completed', 'value' => '+127', 'percent' => '85'],
            ['label' => 'Client Satisfaction', 'value' => '98.5%', 'percent' => '98'],
            ['label' => 'Code Quality',        'value' => 'A+',    'percent' => '95'],
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

        return view('admin.settings.index', compact(
            'schema', 'settings', 'activeTab',
            'heroStats', 'aboutTags', 'aboutStatCards', 'aboutServices'
        ));
    }

    public function updateStats(Request $request)
    {
        $labels   = $request->input('stat_label',   []);
        $values   = $request->input('stat_value',   []);
        $percents = $request->input('stat_percent', []);

        $stats = [];
        foreach ($labels as $i => $label) {
            if (trim($label) === '') continue;
            $stats[] = [
                'label'   => $label,
                'value'   => $values[$i]   ?? '',
                'percent' => min(100, max(0, (int) ($percents[$i] ?? 0))),
            ];
        }

        Setting::set('hero_stats', json_encode($stats), 'json', 'stats');

        return redirect()->route('admin.settings.index', ['tab' => 'stats'])
            ->with('success', 'Hero stats saved.');
    }

    public function updateAbout(Request $request)
    {
        // Save basic text fields from schema
        foreach ($this->schema()['about']['fields'] as $field) {
            Setting::set($field['key'], $request->input($field['key'], ''), 'text', 'about');
        }

        // Tags
        $tags = array_values(array_filter(array_map('trim', explode(',', $request->input('about_tags', '')))));
        Setting::set('about_tags', json_encode($tags), 'json', 'about');

        // Stat cards
        $statNums    = $request->input('about_stat_num',   []);
        $statLabels  = $request->input('about_stat_label', []);
        $statCards   = [];
        foreach ($statNums as $i => $num) {
            if (trim($num) === '') continue;
            $statCards[] = ['num' => $num, 'label' => $statLabels[$i] ?? ''];
        }
        Setting::set('about_stat_cards', json_encode($statCards), 'json', 'about');

        // Services / what I do
        $svcTitles = $request->input('about_svc_title', []);
        $svcDescs  = $request->input('about_svc_desc',  []);
        $services  = [];
        foreach ($svcTitles as $i => $title) {
            if (trim($title) === '') continue;
            $services[] = ['title' => $title, 'desc' => $svcDescs[$i] ?? ''];
        }
        Setting::set('about_services', json_encode($services), 'json', 'about');

        return redirect()->route('admin.settings.index', ['tab' => 'about'])
            ->with('success', 'About Me settings saved.');
    }

    public function update(Request $request, string $group)
    {
        $schema = $this->schema();

        if (!isset($schema[$group])) {
            abort(404);
        }

        foreach ($schema[$group]['fields'] as $field) {
            $key  = $field['key'];

            if ($field['type'] === 'file') {
                if ($request->hasFile($key) && $request->file($key)->isValid()) {
                    // Delete old file if it exists
                    $old = Setting::get($key);
                    if ($old && Storage::disk('public')->exists(ltrim(str_replace('/storage/', '', $old), '/'))) {
                        Storage::disk('public')->delete(ltrim(str_replace('/storage/', '', $old), '/'));
                    }

                    $path = $request->file($key)->store('uploads/settings', 'public');
                    Setting::set($key, $path, 'text', $group);
                }
                // If no new file uploaded, keep existing value
                continue;
            }

            $type  = $field['type'] === 'textarea' ? 'textarea' : 'text';
            $value = $request->input($key, '');
            Setting::set($key, $value, $type, $group);
        }

        return redirect()->route('admin.settings.index', ['tab' => $group])
            ->with('success', ucfirst($group) . ' settings saved.');
    }
}
