<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use App\Models\Service;
use App\Models\Product;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    public function run()
    {
        // Create categories
        $webCategory = Category::firstOrCreate(['name' => 'Web Development']);
        $systemCategory = Category::firstOrCreate(['name' => 'System Development']);
        
        // Create sample projects
        $projects = [
            [
                'title' => 'Crime Police Management System',
                'slug' => 'crime-police-management-system',
                'description' => 'A comprehensive police management system for tracking cases, managing officers, and generating reports. Built with Laravel and React for modern law enforcement needs.',
                'features' => json_encode([
                    'Case tracking and management',
                    'Officer scheduling and management',
                    'Evidence documentation',
                    'Report generation and analytics',
                    'Role-based access control',
                    'Real-time notifications',
                    'Mobile responsive interface'
                ]),
                'tech_stack' => json_encode(['Laravel', 'React', 'MySQL', 'TailwindCSS', 'Chart.js']),
                'price' => 250000,
                'is_featured' => true,
                'is_for_sale' => true,
                'category_id' => $systemCategory->id,
                'demo_link' => 'https://demo.police-system.example.com',
                'github_link' => 'https://github.com/example/police-management-system',
                'images' => json_encode([
                    'https://via.placeholder.com/800x600/1e40af/ffffff?text=Police+Dashboard',
                    'https://via.placeholder.com/800x600/1e40af/ffffff?text=Case+Management',
                    'https://via.placeholder.com/800x600/1e40af/ffffff?text=Reports+Analytics'
                ]),
            ],
            [
                'title' => 'School Management System',
                'slug' => 'school-management-system',
                'description' => 'Complete school management solution with student registration, grade management, and parent portal integration.',
                'features' => json_encode([
                    'Student registration and records',
                    'Grade management and transcripts',
                    'Attendance tracking',
                    'Parent portal access',
                    'Teacher scheduling',
                    'Online examination system',
                    'Fee management'
                ]),
                'tech_stack' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'Bootstrap', 'PDF Generation']),
                'price' => 180000,
                'is_featured' => true,
                'is_for_sale' => true,
                'category_id' => $systemCategory->id,
                'demo_link' => 'https://demo.school-system.example.com',
                'github_link' => 'https://github.com/example/school-management-system',
                'images' => json_encode([
                    'https://via.placeholder.com/800x600/059669/ffffff?text=Student+Dashboard',
                    'https://via.placeholder.com/800x600/059669/ffffff?text=Grade+Management',
                    'https://via.placeholder.com/800x600/059669/ffffff?text=Parent+Portal'
                ]),
            ],
            [
                'title' => 'E-commerce Platform',
                'slug' => 'ecommerce-platform',
                'description' => 'Modern e-commerce solution with payment integration, inventory management, and analytics dashboard.',
                'features' => json_encode([
                    'Product catalog management',
                    'Shopping cart and checkout',
                    'Payment gateway integration',
                    'Order tracking',
                    'Customer management',
                    'Inventory management',
                    'Sales analytics dashboard'
                ]),
                'tech_stack' => json_encode(['Laravel', 'React', 'Stripe API', 'PostgreSQL', 'Redis']),
                'price' => 200000,
                'is_featured' => true,
                'is_for_sale' => true,
                'category_id' => $webCategory->id,
                'demo_link' => 'https://demo.ecommerce.example.com',
                'github_link' => 'https://github.com/example/ecommerce-platform',
                'images' => json_encode([
                    'https://via.placeholder.com/800x600/dc2626/ffffff?text=Product+Catalog',
                    'https://via.placeholder.com/800x600/dc2626/ffffff?text=Shopping+Cart',
                    'https://via.placeholder.com/800x600/dc2626/ffffff?text=Analytics+Dashboard'
                ]),
            ],
            [
                'title' => 'Hospital Management System',
                'slug' => 'hospital-management-system',
                'description' => 'Comprehensive hospital management solution for patient records, appointments, and medical billing.',
                'features' => json_encode([
                    'Patient registration and records',
                    'Appointment scheduling',
                    'Medical billing system',
                    'Doctor and staff management',
                    'Pharmacy inventory',
                    'Laboratory management',
                    'Electronic health records'
                ]),
                'tech_stack' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'Bootstrap', 'Barcode Integration']),
                'price' => 300000,
                'is_featured' => false,
                'is_for_sale' => true,
                'category_id' => $systemCategory->id,
                'demo_link' => 'https://demo.hospital-system.example.com',
                'images' => json_encode([
                    'https://via.placeholder.com/800x600/7c3aed/ffffff?text=Patient+Records',
                    'https://via.placeholder.com/800x600/7c3aed/ffffff?text=Appointment+System',
                    'https://via.placeholder.com/800x600/7c3aed/ffffff?text=Billing+Dashboard'
                ]),
            ],
            [
                'title' => 'Restaurant POS System',
                'slug' => 'restaurant-pos-system',
                'description' => 'Modern point-of-sale system for restaurants with order management, inventory tracking, and customer loyalty programs.',
                'features' => json_encode([
                    'Order taking and management',
                    'Kitchen display system',
                    'Table management',
                    'Inventory tracking',
                    'Customer loyalty program',
                    'Sales reporting',
                    'Mobile app support'
                ]),
                'tech_stack' => json_encode(['Laravel', 'React Native', 'MySQL', 'WebSocket', 'Receipt Printing']),
                'price' => 120000,
                'is_featured' => false,
                'is_for_sale' => true,
                'category_id' => $webCategory->id,
                'demo_link' => 'https://demo.restaurant-pos.example.com',
                'images' => json_encode([
                    'https://via.placeholder.com/800x600/ea580c/ffffff?text=POS+Interface',
                    'https://via.placeholder.com/800x600/ea580c/ffffff?text=Kitchen+Display',
                    'https://via.placeholder.com/800x600/ea580c/ffffff?text=Sales+Reports'
                ]),
            ],
            [
                'title' => 'HR Management System',
                'slug' => 'hr-management-system',
                'description' => 'Complete HR management solution for employee records, payroll, and performance tracking.',
                'features' => json_encode([
                    'Employee records management',
                    'Payroll processing',
                    'Leave management',
                    'Performance tracking',
                    'Recruitment management',
                    'Training management',
                    'Employee self-service portal'
                ]),
                'tech_stack' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'Bootstrap', 'PDF Generation']),
                'price' => 150000,
                'is_featured' => false,
                'is_for_sale' => true,
                'category_id' => $systemCategory->id,
                'demo_link' => 'https://demo.hr-system.example.com',
                'images' => json_encode([
                    'https://via.placeholder.com/800x600/0891b2/ffffff?text=Employee+Dashboard',
                    'https://via.placeholder.com/800x600/0891b2/ffffff?text=Payroll+System',
                    'https://via.placeholder.com/800x600/0891b2/ffffff?text=Performance+Reports'
                ]),
            ],
        ];

        foreach ($projects as $project) {
            Project::firstOrCreate(['slug' => $project['slug']], $project);
        }

        // Create sample services
        $services = [
            [
                'title' => 'Custom Web Applications',
                'description' => 'Custom web applications that automate your business operations using Laravel and React. Scalable, secure, and tailored to your specific needs.',
                'price' => null,
                'pricing_type' => 'custom',
                'features' => json_encode([
                    'Authentication & Authorization Systems',
                    'Interactive Dashboards & Analytics',
                    'RESTful APIs & Web Services',
                    'Real-time Notifications',
                    'Database Design & Optimization',
                    'Cloud Deployment & Hosting'
                ]),
                'icon' => 'fas fa-code',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Business System Development',
                'description' => 'Complete business management systems that streamline your operations. From school management to inventory tracking, I build solutions that work.',
                'price' => null,
                'pricing_type' => 'custom',
                'features' => json_encode([
                    'School Management Systems',
                    'Police & Law Enforcement Systems',
                    'Inventory & Stock Management',
                    'HR & Payroll Systems',
                    'Hospital Management Solutions',
                    'Point of Sale (POS) Systems'
                ]),
                'icon' => 'fas fa-building',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'API Development & Integration',
                'description' => 'RESTful APIs and third-party integrations that connect your systems. Payment gateways, M-Pesa integration, and external service connections.',
                'price' => 35000,
                'pricing_type' => 'fixed',
                'features' => json_encode([
                    'RESTful API Design & Development',
                    'M-Pesa Payment Integration',
                    'Stripe & PayPal Integration',
                    'Third-party Service APIs',
                    'Webhook Implementation',
                    'API Documentation & Testing'
                ]),
                'icon' => 'fas fa-plug',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'UI/UX & Frontend Design',
                'description' => 'Clean, modern interfaces that users love. Responsive design that works perfectly on all devices with focus on user experience.',
                'price' => 45000,
                'pricing_type' => 'fixed',
                'features' => json_encode([
                    'Responsive Web Design',
                    'Modern UI/UX Principles',
                    'Interactive Prototypes',
                    'Component Libraries',
                    'Accessibility Compliance',
                    'Performance Optimization'
                ]),
                'icon' => 'fas fa-paint-brush',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Graphics & Brand Design',
                'description' => 'Professional graphics design for your business. Logos, flyers, social media graphics, and complete brand identity packages.',
                'price' => 25000,
                'pricing_type' => 'fixed',
                'features' => json_encode([
                    'Logo Design & Brand Identity',
                    'Marketing Flyers & Brochures',
                    'Social Media Graphics',
                    'Business Card Design',
                    'Brand Guidelines',
                    'Digital Marketing Materials'
                ]),
                'icon' => 'fas fa-palette',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'title' => 'E-commerce Solutions',
                'description' => 'Complete online stores with payment processing, inventory management, and customer management. Start selling online today.',
                'price' => 75000,
                'pricing_type' => 'fixed',
                'features' => json_encode([
                    'Product Catalog Management',
                    'Shopping Cart & Checkout',
                    'Payment Gateway Integration',
                    'Order Management System',
                    'Customer Accounts',
                    'Sales Analytics Dashboard'
                ]),
                'icon' => 'fas fa-shopping-cart',
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(['title' => $service['title']], $service);
        }

        // Create sample products
        $products = [
            [
                'name' => 'School Management System',
                'slug' => 'school-management-system-product',
                'description' => 'Ready-to-use school management system with student management, grade tracking, attendance, and parent portal.',
                'price' => 150000,
                'downloads' => 45,
                'is_active' => true,
            ],
            [
                'name' => 'Police Management System',
                'slug' => 'police-management-system-product',
                'description' => 'Complete police department management solution for case tracking, officer management, and reporting.',
                'price' => 200000,
                'downloads' => 28,
                'is_active' => true,
            ],
            [
                'name' => 'Logistics Management System',
                'slug' => 'logistics-management-system',
                'description' => 'Comprehensive logistics solution for fleet management, route optimization, and delivery tracking.',
                'price' => 120000,
                'downloads' => 67,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(['slug' => $product['slug']], $product);
        }
    }
}
