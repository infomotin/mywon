<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        // 1. Admin User (Bangladeshi Software Engineer Profile)
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Tanvir Ahmed',
                'username' => 'tanvir_dev',
                'phone' => '+8801712345678',
                'address' => 'Dhaka, Bangladesh',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // 2. Hero Section
        DB::table('heroes')->truncate();
        DB::table('heroes')->insert([
            'name' => 'Tanvir Ahmed',
            'title' => 'Software Engineer',
            'description' => 'Passionate Full Stack Developer from Dhaka, Bangladesh. Specializing in Laravel, Vue.js, and Cloud Solutions. Building scalable web applications for global clients.',
            'image' => 'upload/hero/hero_image.png',
            'facebook' => 'https://facebook.com/tanvir',
            'twitter' => 'https://twitter.com/tanvir',
            'instagram' => 'https://instagram.com/tanvir',
            'linkedin' => 'https://linkedin.com/in/tanvir',
            'YOE' => '5+',
            'CV' => 'upload/cv/resume.pdf',
            'HC' => '50+',
            'Location' => 'Dhaka, BD',
            'github' => 'https://github.com/tanvir',
            'problem_statement' => 'Solving complex business problems with clean code and modern architecture.',
        ]);

        // 3. Website Settings
        DB::table('settings')->truncate();
        DB::table('settings')->insert([
            'website_name' => 'Tanvir Portfolio',
            'logo' => 'upload/logo/logo.png',
            'favicon' => 'upload/logo/favicon.ico',
            'meta_title' => 'Tanvir Ahmed - Software Engineer',
            'meta_description' => 'Portfolio of Tanvir Ahmed, a Software Engineer based in Bangladesh.',
            'meta_keywords' => 'Software Engineer, Laravel Developer, Bangladesh, Web Developer, Full Stack',
        ]);

        // 4. Skills
        DB::table('my_skills')->truncate();
        $skills = [
            ['name' => 'PHP', 'level' => 95, 'order' => 1],
            ['name' => 'Laravel', 'level' => 90, 'order' => 2],
            ['name' => 'JavaScript', 'level' => 85, 'order' => 3],
            ['name' => 'Vue.js', 'level' => 80, 'order' => 4],
            ['name' => 'MySQL', 'level' => 90, 'order' => 5],
            ['name' => 'AWS', 'level' => 70, 'order' => 6],
            ['name' => 'Git', 'level' => 95, 'order' => 7],
            ['name' => 'Docker', 'level' => 75, 'order' => 8],
        ];
        DB::table('my_skills')->insert($skills);

        // 5. Experience (Resumes table)
        DB::table('resumes')->truncate();
        $experience = [
            [
                'title' => 'Senior Software Engineer',
                'company' => 'Tech Solutions BD',
                'period' => '2023 - Present',
                'order' => 1,
            ],
            [
                'title' => 'Software Developer',
                'company' => 'Creative IT Institute',
                'period' => '2021 - 2023',
                'order' => 2,
            ],
            [
                'title' => 'Junior Web Developer',
                'company' => 'SoftLab Dhaka',
                'period' => '2020 - 2021',
                'order' => 3,
            ],
        ];
        DB::table('resumes')->insert($experience);

        // 6. Education
        DB::table('education')->truncate();
        $education = [
            [
                'title' => 'B.Sc. in Computer Science & Engineering',
                'institution' => 'North South University',
                'period' => '2016 - 2020',
                'order' => 1,
            ],
            [
                'title' => 'Higher Secondary Certificate',
                'institution' => 'Dhaka College',
                'period' => '2014 - 2016',
                'order' => 2,
            ],
        ];
        DB::table('education')->insert($education);

        // 7. Services
        DB::table('services')->truncate();
        $services = [
            [
                'service_title' => 'Web Application Development',
                'service_description' => 'Building robust and scalable web applications using Laravel and Vue.js.',
                'service_image' => 'upload/services/web_dev.png',
            ],
            [
                'service_title' => 'API Development',
                'service_description' => 'Designing and implementing RESTful APIs for mobile and web apps.',
                'service_image' => 'upload/services/api.png',
            ],
            [
                'service_title' => 'E-commerce Solutions',
                'service_description' => 'Custom e-commerce platforms with secure payment gateway integration.',
                'service_image' => 'upload/services/ecommerce.png',
            ],
            [
                'service_title' => 'Cloud Deployment',
                'service_description' => 'Deploying and managing applications on AWS and DigitalOcean.',
                'service_image' => 'upload/services/cloud.png',
            ],
        ];
        DB::table('services')->insert($services);
        
        // 8. Testimonials
        DB::table('testimonials')->truncate();
        DB::table('testimonials')->insert([
            [
                'name' => 'Rahim Uddin',
                'designation' => 'CEO, StartUp BD',
                'quote' => 'Tanvir is an exceptional developer. He delivered our project on time and exceeded expectations.',
                'user_image' => 'upload/testimonials/client1.jpg',
            ],
            [
                'name' => 'Sarah Khan',
                'designation' => 'Project Manager',
                'quote' => 'Great communication and technical skills. Highly recommended for complex web projects.',
                'user_image' => 'upload/testimonials/client2.jpg',
            ]
        ]);

        // 9. Categories
        DB::table('categories')->truncate();
        $categories = [
            ['id' => 1, 'name' => 'Web Development', 'slug' => 'web-development'],
            ['id' => 2, 'name' => 'App Development', 'slug' => 'app-development'],
            ['id' => 3, 'name' => 'UI/UX Design', 'slug' => 'ui-ux-design'],
        ];
        DB::table('categories')->insert($categories);

        // 10. Portfolios
        DB::table('portfolios')->truncate();
        DB::table('portfolios')->insert([
            [
                'title' => 'E-commerce Platform',
                'subtitle' => 'Full Stack Web App',
                'image' => 'upload/portfolio/ecommerce.jpg',
                'description' => 'A complete multi-vendor e-commerce platform built with Laravel and Vue.js.',
                'services_cat_id' => 1, // Web Development
                'url' => 'https://example.com/ecommerce',
            ],
            [
                'title' => 'Ride Sharing App',
                'subtitle' => 'Mobile Application API',
                'image' => 'upload/portfolio/ride_app.jpg',
                'description' => 'Backend API for a ride-sharing application serving thousands of users.',
                'services_cat_id' => 2, // App Development
                'url' => 'https://example.com/rideapp',
            ],
            [
                'title' => 'Fintech Dashboard',
                'subtitle' => 'Admin Dashboard',
                'image' => 'upload/portfolio/dashboard.jpg',
                'description' => 'Modern and responsive admin dashboard for a fintech company.',
                'services_cat_id' => 3, // UI/UX Design
                'url' => 'https://example.com/fintech',
            ],
        ]);

        // 11. Personal Data (History)
        DB::table('personal_data')->truncate();
        DB::table('personal_data')->insert([
            [
                'history_title' => 'Started Journey',
                'year' => 2016,
                'history' => 'Started my journey in Computer Science at North South University.',
            ],
            [
                'history_title' => 'First Freelance Job',
                'year' => 2018,
                'history' => 'Completed my first freelance web development project for a local client.',
            ],
            [
                'history_title' => 'Graduation',
                'year' => 2020,
                'history' => 'Graduated with honors in Computer Science & Engineering.',
            ],
            [
                'history_title' => 'Senior Role',
                'year' => 2023,
                'history' => 'Promoted to Senior Software Engineer at Tech Solutions BD.',
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
