<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have an admin user
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]);
        }

        // Ensure Categories exist
        $categories = [
            'Web Development',
            'Artificial Intelligence',
            'Cloud Computing',
            'Software Architecture'
        ];

        $categoryIds = [];
        foreach ($categories as $catName) {
            $category = Category::firstOrCreate(
                ['slug' => Str::slug($catName)],
                ['name' => $catName]
            );
            $categoryIds[$catName] = $category->id;
        }

        // Ensure Tags exist
        $tags = ['Laravel', 'Vue.js', 'AWS', 'AI', 'Machine Learning', 'PHP', 'JavaScript'];
        $tagIds = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(
                ['slug' => Str::slug($tagName)],
                ['name' => $tagName]
            );
            $tagIds[] = $tag->id;
        }

        // Blog Posts Data
        $posts = [
            [
                'title' => 'The Rise of Artificial Intelligence in Web Development',
                'category' => 'Artificial Intelligence',
                'content' => '
                    <p>Artificial Intelligence (AI) is transforming the landscape of web development. From automated code generation to intelligent user interfaces, AI is enabling developers to build smarter, more efficient applications.</p>
                    
                    <h3>Description</h3>
                    <p>AI-powered tools like GitHub Copilot and ChatGPT are assisting developers in writing code faster and with fewer errors. Moreover, AI integration in web apps allows for personalized user experiences, chatbots, and predictive analytics. This shift is not just about automation but about augmenting human creativity and solving complex problems that were previously impossible.</p>
                    
                    <h3>Why We Use This Technology</h3>
                    <ul>
                        <li><strong>Efficiency:</strong> AI automates repetitive tasks, allowing developers to focus on logic and architecture.</li>
                        <li><strong>Personalization:</strong> AI algorithms analyze user behavior to deliver tailored content and recommendations.</li>
                        <li><strong>Innovation:</strong> Integrating AI opens up new possibilities for features like voice recognition, image analysis, and natural language processing.</li>
                    </ul>
                    <p>In our projects, we leverage AI to enhance search functionality, automate customer support via chatbots, and optimize backend performance through predictive scaling.</p>
                ',
                'tags' => ['AI', 'Machine Learning', 'JavaScript']
            ],
            [
                'title' => 'Why Laravel is the Best Framework for Enterprise Applications',
                'category' => 'Web Development',
                'content' => '
                    <p>Laravel has established itself as the premier PHP framework for building robust, scalable, and secure enterprise-grade applications. Its elegant syntax and powerful ecosystem make it a top choice for businesses worldwide.</p>
                    
                    <h3>Description</h3>
                    <p>Laravel provides a comprehensive set of tools for everything from authentication and database management to queuing and caching. Its MVC architecture ensures code organization and maintainability. With features like Eloquent ORM, Artisan CLI, and Blade templating, Laravel streamlines the development process without compromising on performance.</p>
                    
                    <h3>Why We Use This Technology</h3>
                    <ul>
                        <li><strong>Security:</strong> Laravel offers built-in protection against common vulnerabilities like SQL injection, XSS, and CSRF.</li>
                        <li><strong>Scalability:</strong> With support for advanced caching (Redis/Memcached) and job queues, Laravel applications can handle high traffic loads effortlessly.</li>
                        <li><strong>Ecosystem:</strong> Tools like Laravel Forge, Nova, and Vapor provide a complete ecosystem for development, deployment, and management.</li>
                    </ul>
                    <p>We choose Laravel for our enterprise clients because it guarantees a secure foundation, rapid development cycles, and long-term maintainability.</p>
                ',
                'tags' => ['Laravel', 'PHP', 'Software Architecture']
            ],
            [
                'title' => 'Modern Frontend Architecture with Vue.js',
                'category' => 'Web Development',
                'content' => '
                    <p>Vue.js is a progressive JavaScript framework that is taking the frontend development world by storm. Its simplicity and flexibility make it an ideal choice for building interactive user interfaces and Single Page Applications (SPAs).</p>
                    
                    <h3>Description</h3>
                    <p>Vue.js allows developers to adopt it incrementally. You can use it for a simple widget or build a full-blown SPA using Vue Router and Pinia/Vuex. Its reactive data binding and component-based architecture make building complex UIs intuitive and efficient. The framework is lightweight yet powerful, offering excellent performance.</p>
                    
                    <h3>Why We Use This Technology</h3>
                    <ul>
                        <li><strong>Reactivity:</strong> Vue\'s reactivity system ensures that the UI automatically updates when the state changes, providing a seamless user experience.</li>
                        <li><strong>Component-Based:</strong> Breaking down the UI into reusable components speeds up development and ensures consistency across the application.</li>
                        <li><strong>Performance:</strong> Vue\'s virtual DOM implementation is highly optimized, resulting in fast rendering and smooth animations.</li>
                    </ul>
                    <p>We utilize Vue.js to create dynamic, responsive, and app-like experiences for our web users, ensuring high engagement and satisfaction.</p>
                ',
                'tags' => ['Vue.js', 'JavaScript', 'Web Development']
            ],
            [
                'title' => 'Cloud Computing: AWS vs DigitalOcean for Startups',
                'category' => 'Cloud Computing',
                'content' => '
                    <p>Choosing the right cloud provider is a critical decision for any startup. AWS and DigitalOcean are two of the most popular choices, each with its own strengths and use cases.</p>
                    
                    <h3>Description</h3>
                    <p>AWS (Amazon Web Services) offers a vast array of services, from basic compute instances (EC2) to advanced machine learning and serverless functions (Lambda). It is the industry standard for enterprise-scale infrastructure. DigitalOcean, on the other hand, focuses on simplicity and developer experience, offering straightforward pricing and easy-to-use Droplets.</p>
                    
                    <h3>Why We Use This Technology</h3>
                    <ul>
                        <li><strong>Scalability (AWS):</strong> For projects that anticipate massive growth or require specialized services, AWS provides unmatched scalability and feature depth.</li>
                        <li><strong>Simplicity (DigitalOcean):</strong> For early-stage startups and simple applications, DigitalOcean offers a lower barrier to entry and predictable costs.</li>
                        <li><strong>Reliability:</strong> Both providers offer high availability and global data centers, ensuring your application is always online.</li>
                    </ul>
                    <p>We analyze our clients\' specific needs to select the optimal cloud infrastructure. Whether it\'s the raw power of AWS or the simplicity of DigitalOcean, we ensure the deployment is secure, cost-effective, and scalable.</p>
                ',
                'tags' => ['AWS', 'Cloud Computing', 'Software Architecture']
            ]
        ];

        // Use the existing image or a placeholder filename
        // Since we know 'the-role-of-technology-in-modern-logistics-management.jpg' exists in 'upload/posts/'
        $thumbnail = 'the-role-of-technology-in-modern-logistics-management.jpg';

        foreach ($posts as $postData) {
            $blog = Blog::create([
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'content' => $postData['content'],
                'thumbnail' => $thumbnail,
                'category_id' => $categoryIds[$postData['category']],
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Attach tags
            $tagIdsToAttach = [];
            foreach ($postData['tags'] as $tagName) {
                $tag = Tag::where('name', $tagName)->first();
                if ($tag) {
                    $tagIdsToAttach[] = $tag->id;
                }
            }
            $blog->tags()->sync($tagIdsToAttach);
        }
    }
}
