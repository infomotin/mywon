# ডেভেলপার ডকুমেন্টেশন এবং প্রজেক্ট আপডেট লগ

**তারিখ:** ২০২৬-০১-২৮  
**প্রজেক্ট:** পার্সোনাল পোর্টফোলিও এবং ব্লগ সিস্টেম  
**ফ্রেমওয়ার্ক:** লারাভেল ১২.x  
**লেখক:** এআই অ্যাসিস্ট্যান্ট (Trae IDE)

---

## ১. প্রজেক্ট সারাংশ এবং উদ্দেশ্য (Executive Summary)
এই ডকুমেন্টটি পোর্টফোলিও অ্যাপ্লিকেশনের সাম্প্রতিক বড় পরিবর্তনগুলোর বিস্তারিত বিবরণ। আমাদের মূল লক্ষ্য ছিল একটি সাধারণ স্ট্যাটিক পোর্টফোলিও সাইটকে একটি ডাইনামিক, ইন্টারঅ্যাকটিভ প্ল্যাটফর্মে রূপান্তর করা, যেখানে কন্টেন্ট ম্যানেজমেন্ট, ইউজার এনগেজমেন্ট (সাবস্ক্রিপশন) এবং অটোমেটেড মার্কেটিং (নিউজলেটার) সুবিধা থাকবে।

ডেভেলপমেন্ট রোডম্যাপটি ছিল নিম্নরূপ:
১.  **পোর্টফোলিও ডিটেইলস:** প্রজেক্ট শোকেসিং আরও বিস্তারিত করা।
২.  **কন্টেন্ট ইঞ্জিন:** একটি পূর্ণাঙ্গ ব্লগ সিস্টেম তৈরি করা।
৩.  **অডিয়েন্স রিটেনশন:** সাবস্ক্রিপশন এবং কন্টাক্ট মেকানিজম তৈরি করা।
৪.  **অটোমেশন:** অডিয়েন্সকে এনগেজড রাখার জন্য অটোমেটেড ইমেইল কমিউনিকেশন।

---

## ২. ফিচার ইমপ্লিমেন্টেশন লগ (কি এবং কেন?)

### ক. পোর্টফোলিও ম্যানেজমেন্ট সিস্টেম
*   **লক্ষ্য**: শুধুমাত্র ছবির গ্যালারি থেকে বেরিয়ে এসে বিস্তারিত কেস স্টাডি তৈরি করা।
*   **বাস্তবায়ন**:
    *   **ডাটাবেস**: `portfolios` টেবিলে `long_description`, `client`, `project_date`, `technologies`, এবং `url` কলাম যুক্ত করা হয়েছে।
    *   **ফ্রন্টএন্ড**: প্রজেক্টের বিস্তারিত দেখানোর জন্য `portfolio_details.blade.php` তৈরি করা হয়েছে।
    *   **ব্যাকএন্ড**: `PortfolioController` আপডেট করা হয়েছে যাতে রিচ টেক্সট এবং নতুন ফিল্ডগুলো সেভ করা যায়।
*   **কেন**: ক্লায়েন্টদের প্রজেক্টের *কনটেক্সট* এবং *টেকনোলজি স্ট্যাক* বোঝা প্রয়োজন, শুধু স্ক্রিনশট দেখা যথেষ্ট নয়।

### খ. ব্লগ সিস্টেম
*   **লক্ষ্য**: নিজের দক্ষতা প্রমাণ করা এবং এসইও (SEO) ইম্প্রুভ করা।
*   **বাস্তবায়ন**:
    *   **MVC**: `BlogController` (ফ্রন্টএন্ড এবং ব্যাকএন্ড), `Blog` মডেল এবং মাইগ্রেশন তৈরি করা হয়েছে।
    *   **সিডিং (Seeding)**: সাইটটি যাতে একদম খালি না থাকে, তাই `BlogSeeder` এর মাধ্যমে ৪টি টেক-রিলেটেড আর্টিকেল (AI, Web Dev) যুক্ত করা হয়েছে।
    *   **ডিটেইলস পেজ**: `blog_details.blade.php` তৈরি করা হয়েছে যেখানে সাইডবার নেভিগেশন এবং ক্যাটাগরি লিঙ্ক রয়েছে।
*   **কেন**: স্ট্যাটিক সাইট দ্রুত হারিয়ে যায়; ডাইনামিক কন্টেন্ট ট্রাফিক বাড়ায় এবং আপনার দক্ষতা প্রমাণ করে।

### গ. সাবস্ক্রাইবার এবং নিউজলেটার সিস্টেম
*   **লক্ষ্য**: ভিজিটরদের লিড হিসেবে ক্যাপচার করা এবং অডিয়েন্স তৈরি করা।
*   **বাস্তবায়ন**:
    *   **ক্যাপচার**: ফুটারে (`footer.blade.php`) AJAX-পাওয়ারড সাবস্ক্রিপশন ফর্ম যুক্ত করা হয়েছে।
    *   **স্টোরেজ**: `subscribers` টেবিল এবং `Subscriber` মডেল তৈরি করা হয়েছে।
    *   **ওয়েলকাম ফ্লো**: সাইন-আপ করার সাথে সাথেই একটি অটোমেটেড ওয়েলকাম ইমেইল (`WelcomeSubscriber` mailable) পাঠানোর ব্যবস্থা করা হয়েছে।
    *   **অ্যাডমিন প্যানেল**: সাবস্ক্রাইবার ম্যানেজমেন্ট ড্যাশবোর্ড তৈরি করা হয়েছে যেখানে ইউজার দেখা/ডিলিট করা এবং ম্যানুয়াল নিউজলেটার পাঠানো যায়।
*   **কেন**: প্রফেশনাল কমিউনিকেশনের জন্য ইমেইল এখনও সবচেয়ে কার্যকরী মাধ্যম।

### ঘ. অটোমেটেড নোটিফিকেশন ইঞ্জিন
*   **লক্ষ্য**: "সেট ইট অ্যান্ড ফরগেট ইট" মার্কেটিং।
*   **বাস্তবায়ন**:
    *   **ট্রিগার**: `BlogController@store` এবং `PortfolioController@store` মেথডে হুক বসানো হয়েছে।
    *   **জব (Jobs)**: `NotifySubscribersOfNewBlogPost` এবং `NotifySubscribersOfNewPortfolio` জব তৈরি করা হয়েছে।
    *   **লজিক**: যখনই নতুন কোনো পোস্ট সেভ করা হয়, সিস্টেম অটোমেটিক্যালি সব সাবস্ক্রাইবারকে ইমেইল পাঠানোর জন্য কিউ (Queue) তে পাঠিয়ে দেয়।
*   **কেন**: ম্যানুয়ালি নিউজলেটার পাঠানো প্রায়ই ভুলে যাওয়া হয়। অটোমেশন নিশ্চিত করে যে আপনার অডিয়েন্স সবসময় আপডেট পাচ্ছে।

### ঙ. আনসাবস্ক্রাইব সিস্টেম (GDPR কমপ্লায়েন্স)
*   **লক্ষ্য**: ব্যবহারকারীদের ইমেইল লিস্ট থেকে বেরিয়ে যাওয়ার সুযোগ দেওয়া এবং স্প্যাম রিপোর্ট কমানো।
*   **বাস্তবায়ন**:
    *   **ডাটাবেস**: `subscribers` টেবিলে `is_active` (boolean) এবং `token` (string, unique) কলাম যুক্ত করা হয়েছে।
    *   **মডেল**: `Subscriber` মডেল আপডেট করা হয়েছে যাতে সাবস্ক্রাইবার তৈরি হওয়ার সময় অটোমেটিক্যালি একটি ইউনিক টোকেন জেনারেট হয়।
    *   **রাউট**: `/unsubscribe/{email}/{token}` রাউট তৈরি করা হয়েছে যা `SubscriberController@unsubscribe` মেথডে হিট করে।
    *   **লজিক**: ইউজার লিঙ্কে ক্লিক করলে `is_active` ফলস (false) হয়ে যায়। ইমেইল পাঠানোর জবগুলো এখন শুধুমাত্র `where('is_active', true)` কন্ডিশনে ইমেইল পাঠায়।
    *   **ভিউ**: সফল এবং ব্যর্থ আনসাবস্ক্রিপশনের জন্য `unsubscribe_success.blade.php` এবং `unsubscribe_fail.blade.php` তৈরি করা হয়েছে।
    *   **ইমেইল ফুটার**: প্রতিটি ইমেইলের নিচে আনসাবস্ক্রাইব লিঙ্ক যুক্ত করা হয়েছে।
*   **কেন**: এটি শুধুমাত্র একটি ভালো প্র্যাকটিসই নয়, এটি অনেক দেশের আইনের বাধ্যবাধকতা।

### চ. কিউ ম্যানেজমেন্ট ড্যাশবোর্ড (Queue Management Dashboard)
*   **লক্ষ্য**: কমান্ড লাইন ছাড়াই ব্যাকগ্রাউন্ড জব বা ইমেইল প্রসেসিং মনিটর এবং কন্ট্রোল করা।
*   **বাস্তবায়ন**:
    *   **কন্ট্রোলার**: `App\Http\Controllers\Backend\QueueController` তৈরি করা হয়েছে।
    *   **ফিচার**:
        *   **ওয়ার্কার স্ট্যাটাস**: বর্তমানে কিউ ওয়ার্কার চলছে কিনা তা চেক করা।
        *   **Start/Stop Worker**: উইন্ডোজ এনভায়রনমেন্টের জন্য ব্যাকগ্রাউন্ড প্রসেস কন্ট্রোল (`start /B` এবং `taskkill` ব্যবহার করে)।
        *   **জব মনিটরিং**: পেন্ডিং জব এবং ফেইলড জবের তালিকা ও বিস্তারিত দেখা।
        *   **অ্যাকশনস**: ফেইলড জব রিট্রাই (Retry) বা ডিলিট (Delete) করার সুবিধা।
    *   **ভিউ**: `resources/views/backend/admin/queue/index.blade.php` এ একটি পূর্ণাঙ্গ ড্যাশবোর্ড তৈরি করা হয়েছে।
*   **কেন**: ডেভেলপার ছাড়া সাধারণ অ্যাডমিনদের পক্ষে টার্মিনাল কমান্ড (`php artisan queue:work`) চালানো কঠিন। এই ড্যাশবোর্ডটি সেই সমস্যার সমাধান করে।

---

## ৩. টেকনিক্যাল আর্কিটেকচার (কিভাবে কাজ করে?)

### আর্কিটেকচার ওভারভিউ
সিস্টেমটি স্ট্যান্ডার্ড লারাভেল MVC আর্কিটেকচার ব্যবহার করে, কিন্তু ভারী কাজ (যেমন ইমেইল পাঠানো) করার জন্য **Jobs এবং Queues** ব্যবহার করা হয়েছে।

**মূল কম্পোনেন্টসমূহ:**
*   **Controllers**: ইউজারের ইনপুট নেয় এবং ভিউ/JSON রিটার্ন করে।
*   **Mailables**: ইমেইলের কন্টেন্ট ডিজাইন করে (Blade templates)।
*   **Jobs**: ইমেইল পাঠানোর কাজটিকে ইউজারের রিকোয়েস্ট থেকে আলাদা করে ব্যাকগ্রাউন্ডে প্রসেস করে।

### এক্সিকিউশন ফ্লো: নতুন ব্লগ পোস্ট নোটিফিকেশন
একজন অ্যাডমিন যখন ব্লগ পোস্ট করেন তখন কোডটি যেভাবে কাজ করে:

১.  **ইউজার অ্যাকশন**: অ্যাডমিন "Create Blog" ফর্ম পূরণ করে "Save" এ ক্লিক করেন।
২.  **কন্ট্রোলার**: `App\Http\Controllers\BlogController@store` রিকোয়েস্টটি রিসিভ করে।
    *   ইনপুট ভ্যালিডেট করে।
    *   ডাটাবেসে `Blog` মডেল সেভ করে।
    *   ফাইল আপলোড (থাম্বনেইল) হ্যান্ডেল করে।
৩.  **ডিসপ্যাচ (Dispatch)**: কন্ট্রোলার নিচের কোডটি রান করে:
    ```php
    dispatch(new NotifySubscribersOfNewBlogPost($blog));
    ```
    *   এটি ডাটাবেস কিউতে (`jobs` টেবিল) একটি টাস্ক পাঠিয়ে দেয়।
    *   কন্ট্রোলার *সাথে সাথেই* অ্যাডমিনকে সাকসেস মেসেজ দেখায়। **অ্যাডমিনকে ইমেইল পাঠানো শেষ হওয়া পর্যন্ত অপেক্ষা করতে হয় না।**
৪.  **কিউ ওয়ার্কার**: ব্যাকগ্রাউন্ড প্রসেস (`php artisan queue:work`) জবটি পিক করে।
৫.  **জব এক্সিকিউশন**: `App\Jobs\NotifySubscribersOfNewBlogPost@handle` রান হয়:
    *   সব সাবস্ক্রাইবারকে খুঁজে বের করে: `Subscriber::where('is_active', true)->get()`।
    *   লুপ চালায়।
    *   প্রত্যেককে `NewBlogPostMail` সেন্ড করে।
৬.  **ফলাফল**: সাবস্ক্রাইবাররা নতুন পোস্টের টাইটেল, ছবি এবং লিঙ্কসহ ইমেইল পায়।

---

## ৪. ফাইলের গঠন

### ব্যাকএন্ড লজিক
*   `app/Http/Controllers/Backend/SubscriberController.php`: অ্যাডমিন নিউজলেটার লজিক।
*   `app/Http/Controllers/Backend/QueueController.php`: কিউ ম্যানেজমেন্ট লজিক।
*   `app/Http/Controllers/Backend/PortfolioContorller.php`: পোর্টফোলিও লজিক + জব ট্রিগার।
*   `app/Http/Controllers/BlogController.php`: ব্লগ লজিক + জব ট্রিগার।

### কিউ এবং জবস (Queue & Jobs)
*   `app/Jobs/SendNewsletterJob.php`: ম্যানুয়াল নিউজলেটার পাঠানোর জন্য।
*   `app/Jobs/NotifySubscribersOfNewBlogPost.php`: ব্লগের জন্য অটো-ট্রিগার।
*   `app/Jobs/NotifySubscribersOfNewPortfolio.php`: পোর্টফোলিওর জন্য অটো-ট্রিগার।

### মেইল টেম্পলেট
*   `resources/views/mail/newsletter.blade.php`
*   `resources/views/mail/new_blog_post.blade.php`
*   `resources/views/mail/new_portfolio.blade.php`
*   `resources/views/mail/welcome_subscriber.blade.php`

---

## ৫. ডেভেলপার গাইড (সিস্টেম চালানোর নিয়ম)

### প্রয়োজনীয় টুলস (Prerequisites)
*   PHP 8.2+
*   Composer
*   MySQL
*   SMTP Server (যেমন: Mailtrap, Gmail, অথবা হোস্টিং প্রোভাইডার) `.env` ফাইলে কনফিগার করা থাকতে হবে।

### সেটআপ
১.  **ডিপেন্ডেন্সি ইনস্টল**:
    ```bash
    composer install
    npm install && npm run build
    ```
২.  **ডাটাবেস**:
    ```bash
    php artisan migrate
    php artisan db:seed --class=BlogSeeder
    ```

### কিউ চালানো (খুবই গুরুত্বপূর্ণ)
যেহেতু ইমেইলগুলো কিউ (Queue) এর মাধ্যমে পাঠানো হয়, তাই কিউ ওয়ার্কার চালু না থাকলে ইমেইল **যাবে না**।

**অপশন ১: ড্যাশবোর্ড থেকে (নতুন)**
অ্যাডমিন প্যানেলে লগইন করে **System > Queue Manager** এ যান এবং "Start Worker" বাটনে ক্লিক করুন।

**অপশন ২: টার্মিনাল থেকে**
একটি আলাদা টার্মিনালে নিচের কমান্ডটি রান করে রাখুন:
```bash
php artisan queue:work
```

**প্রোডাকশন**:
সার্ভারে **Supervisor** সেটআপ করতে হবে যাতে `php artisan queue:work` সবসময় ব্যাকগ্রাউন্ডে চলতে থাকে।

---

## ৬. বাগ ফিক্স এবং মেইনটেনেন্স লগ (Bug Fixes & Maintenance)

### ২০২৬-০১-২৮: কিউ ম্যানেজমেন্ট এরর ফিক্স
*   **Event/Prompt**: `/queue` পেজ লোড করার সময় `Illuminate\Database\QueryException` এবং `Unknown column 'created_at'` এরর দেখাচ্ছিল।
*   **Plan**: ডাটাবেস স্কিমা চেক করে দেখা গেল `failed_jobs` টেবিলে `created_at` কলাম নেই, তার বদলে `failed_at` কলাম আছে। `latest()` মেথড ডিফল্টভাবে `created_at` খোঁজে, তাই এটি ফিক্স করার পরিকল্পনা করা হয়।
*   **Executing**: `App\Http\Controllers\Backend\QueueController.php` ফাইলে `latest()` মেথড আপডেট করা হয়েছে।
*   **Work**: `DB::table('failed_jobs')` কুয়েরিতে `latest()` মেথডের আর্গুমেন্ট হিসেবে `failed_at` কলামটি নির্দিষ্ট করে দেওয়া হয়েছে যাতে এটি সঠিক কলাম অনুযায়ী সর্ট করে।
*   **Change**:
    ```php
    // আগে:
    $failedJobs = DB::table('failed_jobs')->latest()->get();
    
    // পরে:
    $failedJobs = DB::table('failed_jobs')->latest('failed_at')->get();
    ```

### ২০২৬-০১-২৮: সিকিউরিটি ম্যানেজার ইমপ্লিমেন্টেশন
*   **Event/Prompt**: অ্যাডমিন ড্যাশবোর্ডে একটি Security Section তৈরি করা, যেখান থেকে Login Page Captcha, Brute Force Attack Prevention, User Login Log এবং 3D Verification Email (2FA) ম্যানেজ করা যাবে।
*   **Plan**: `SecuritySetting` এবং `LoginLog` model তৈরি করা, `SecurityController` দিয়ে settings update করা, এবং Authentication flow-তে captcha, logging এবং 2FA check যুক্ত করা।
*   **Executing**: Migration run করা, Model ও Controller তৈরি করা, Middleware add করা এবং Login logic update করা।
*   **Work**: `SecuritySetting` মডেল তৈরি করে সেটিংস ম্যানেজ করা হয়েছে। `LoginLog` মডেল দিয়ে লগিন হিস্ট্রি রাখা হচ্ছে। `AuthenticatedSessionController` এবং `LoginRequest`-এ 2FA এবং Captcha লজিক ইন্টিগ্রেট করা হয়েছে।
    *   Security Manager Dashboard তৈরি করা হয়েছে (Captcha, Brute Force, Logs, 2FA enable/disable options সহ)।
    *   Login Page-এ Captcha integration করা হয়েছে।
    *   Brute Force logging limit control করা হয়েছে (3 vs 5 attempts)।
    *   Login successful হলে User Agent ও IP log করার ব্যবস্থা করা হয়েছে।
    *   2FA (Email Verification) system তৈরি করা হয়েছে যা login-এর পর OTP চায়।
*   **Change**:
    *   **Created**: `SecuritySetting`, `LoginLog` Models, `SecurityController`, `TwoFactorController`, `TwoFactorMiddleware`, Views (`admin/security/index`, `auth/two_factor`, `emails/two_factor_code`).
    *   **Modified**: `web.php`, `AuthenticatedSessionController`, `LoginRequest`, `login.blade.php`, `bootstrap/app.php` (middleware alias).

### ২০২৬-০১-২৮: SMTP কনফিগারেশন বাগ ফিক্স
*   **Event/Prompt**: "Email Not Send On 3d Virification" - ব্যবহারকারী রিপোর্ট করেছেন যে 3D ভেরিফিকেশন ইমেইল যাচ্ছে না।
*   **Plan**: `AppServiceProvider` এবং `AuthenticatedSessionController` ডিবাগ করা।
*   **Executing**: `TestSmtp` কমান্ড তৈরি করে মেইল কনফিগারেশন টেস্ট করা।
*   **Work**: দেখা গেছে `AppServiceProvider`-এ `Config::set('mail.mailers.smtp', ...)` কনফিগারেশনে `driver` কি (key) ব্যবহার করা হচ্ছিল, কিন্তু লারাভেল `transport` কি (key) আশা করে।
*   **Change**: `AppServiceProvider.php`-এ `driver` পরিবর্তন করে `transport` করা হয়েছে। এখন ইমেইল সঠিকভাবে সেন্ড হচ্ছে।

### ২০২৬-০১-২৮: অ্যাডমিন প্রোফাইল আপডেট
*   **Event/Prompt**: অ্যাডমিন প্রোফাইল পেজে নাম (First/Last), সোশ্যাল লিঙ্কস এবং বায়ো (About) সেকশন যুক্ত করা।
*   **Plan**: `users` টেবিলে নতুন কলাম যুক্ত করা, `User` মডেল আপডেট করা, এবং `AdminController` ও `editprofile.blade.php` ভিউ আপডেট করা।
*   **Executing**: `php artisan make:migration add_columns_to_users_table` কমান্ড রান করা এবং মাইগ্রেশন সম্পন্ন করা।
*   **Work**: `users` টেবিলে `first_name`, `last_name`, `phone`, `address`, `about`, `website` এবং সোশ্যাল লিঙ্ক (`github`, `twitter` etc.) কলাম যুক্ত করা হয়েছে। `User` মডেলে এগুলোকে `fillable` করা হয়েছে। `AdminController`-এ `updateProfile` মেথড আপডেট করে নতুন ডাটা সেভ করার ব্যবস্থা করা হয়েছে এবং ভিউ ফাইলে ইনপুট ফিল্ড ও ডিসপ্লে লজিক বসানো হয়েছে।
*   **Change**: `users` table migration, `User.php`, `AdminController.php`, `editprofile.blade.php`.

### ২০২৬-০১-২৮: অ্যাডমিন এডিট প্রোফাইল পেজ এরর ফিক্স
*   **Event/Prompt**: `/edit-profile` পেজে এরর আসছিল (undefined property `profile_photo_url`)।
*   **Plan**: `editprofile.blade.php` ফাইলে `profile_photo_url` এর ব্যবহার চেক করা এবং ফিক্স করা।
*   **Executing**: ভিউ ফাইলে ইমেজ সোর্স পাথ আপডেট করা।
*   **Work**: `profile_photo_url` (যা Jetstream এর অংশ) পরিবর্তন করে কাস্টম পাথ লজিক `asset('upload/admin_images/' ...)` বসানো হয়েছে, যা ফাইলের উপরের অংশেও ব্যবহার করা হয়েছে।
*   **Change**: `editprofile.blade.php`.

### ২০২৬-০১-২৮: অ্যাডমিন এডিট প্রোফাইল পেজ diffForHumans এরর ফিক্স
*   **Event/Prompt**: `/edit-profile` পেজে এরর আসছিল (Call to a member function diffForHumans() on null)।
*   **Plan**: `editprofile.blade.php` ফাইলে `created_at` null কিনা চেক করা।
*   **Executing**: `diffForHumans()` কল করার আগে কন্ডিশনাল চেক বসানো।
*   **Work**: `$admin->created_at` যদি `null` হয় তবে `diffForHumans()` কল না করে 'Unknown' দেখানোর ব্যবস্থা করা হয়েছে।
*   **Change**: `editprofile.blade.php`.

### ২০২৬-০১-২৮: অ্যাডমিন হেডার মেনু ডায়নামিক ও এরর ফিক্স
*   **Event/Prompt**: হেডার মেনু (Navbar) প্রোফাইল সেকশনে স্ট্যাটিক ডাটা ছিল এবং ভুল ইমেজ পাথ ছিল।
*   **Plan**: `navbar.blade.php` ফাইলে `auth()->user()` ব্যবহার করে লগইন করা ইউজারের ডাটা (নাম, ইমেইল, ছবি) ডায়নামিক করা।
*   **Executing**: হার্ডকোডেড ভ্যালুগুলো রিপ্লেস করা এবং প্রোফাইল লিঙ্ক আপডেট করা।
*   **Work**: `navbar.blade.php` ফাইলে ইউজারের নাম, ইমেইল এবং প্রোফাইল পিকচার ডায়নামিক করা হয়েছে। প্রোফাইল লিঙ্কটি `admin.edit.profile` রুটে পয়েন্ট করা হয়েছে। Web Apps মেনুর প্রোফাইল লিঙ্কও আপডেট করা হয়েছে।
*   **Change**: `resources/views/backend/admin/body/navbar.blade.php`.

### ২০২৬-০১-২৮: অ্যাডমিন এডিট প্রোফাইল পেজ ফাইল আপলোড ডিজাইন ফিক্স
*   **Event/Prompt**: `/edit-profile` পেজে ফাইল আপলোড ইনপুট এবং প্রিভিউ এর ডিজাইন ভালো ছিল না।
*   **Plan**: `editprofile.blade.php` ফাইলে `Dropify` প্লাগিন যুক্ত করা।
*   **Executing**: Dropify CSS এবং JS যুক্ত করা এবং স্ট্যান্ডার্ড ফাইল ইনপুটকে Dropify দিয়ে রিপ্লেস করা।
*   **Work**: `dropify` ব্যবহার করে ড্র্যাগ-এন্ড-ড্রপ ইমেজ আপলোড এবং প্রিভিউ ইমপ্লিমেন্ট করা হয়েছে। `data-default-file` এট্রিবিউট ব্যবহার করে বর্তমান প্রোফাইল পিকচার দেখানো হয়েছে।
*   **Change**: `resources/views/backend/admin/editprofile.blade.php`.

### ২০২৬-০১-২৮: অ্যাডমিন লেআউট ফিক্স (jQuery Conflict & Stacks)
*   **Event/Prompt**: `/edit-profile` পেজে লেআউট ভেঙ্গে যাচ্ছিল (Not Fix < Bape Contin Wrong Place)।
*   **Plan**: `dashboard.blade.php` ফাইলে স্টাইল এবং স্ক্রিপ্ট স্ট্যাক (`@stack`) যুক্ত করা এবং `editprofile.blade.php` থেকে ডুপ্লিকেট jQuery CDN রিমুভ করা।
*   **Executing**: `dashboard.blade.php` তে `@stack('styles')` এবং `@stack('scripts')` যোগ করা হয়েছে। `editprofile.blade.php` তে `@push` ব্যবহার করে Dropify লোড করা হয়েছে এবং jQuery CDN রিমুভ করা হয়েছে।
*   **Work**: ডুপ্লিকেট jQuery লোডিং এর কারণে টেমপ্লেটের লেআউট স্ক্রিপ্ট কাজ করছিল না। এটি ফিক্স করে সঠিক আর্কিটেকচার ইমপ্লিমেন্ট করা হয়েছে।
*   **Change**: `resources/views/backend/admin/dashboard.blade.php`, `resources/views/backend/admin/editprofile.blade.php`.

---

### ২০২৬-০১-২৮: অ্যাডমিন ফুটার ওভারল্যাপ ফিক্স
*   **Event/Prompt**: `/edit-profile` পেজে ফুটার কন্টেন্টের সাথে ওভারল্যাপ করছিল।
*   **Plan**: `style.css` ফাইলে ফুটারের জন্য CSS রুলস চেক করা এবং ফিক্স করা।
*   **Executing**: `style.css` ফাইলে `.footer` ক্লাসের জন্য `background`, `border-top`, `position: relative` এবং `z-index` প্রপার্টি যুক্ত করা।
*   **Work**: ফুটারটি আগে ট্রান্সপারেন্ট বা পজিশনিং সমস্যার কারণে কন্টেন্টের উপরে চলে আসছিল। `z-index` এবং ব্যাকগ্রাউন্ড কালার দিয়ে এটি ফিক্স করা হয়েছে যাতে এটি কন্টেন্ট থেকে আলাদা থাকে।
*   **Change**: `public/Backend/assets/css/demo2/style.css`.

### ২০২৬-০১-২৮: অ্যাডমিন এডিট প্রোফাইল পেজ লেআউট ফিক্স (Extra Div Removal)
*   **Event/Prompt**: `/edit-profile` পেজে ফুটার বাম পাশে এবং ভুল পজিশনে দেখাচ্ছিল।
*   **Plan**: `editprofile.blade.php` ফাইলের HTML স্ট্রাকচার চেক করা (div balance)।
*   **Executing**: `grep` কমান্ড দিয়ে `div` এর সংখ্যা চেক করা এবং ম্যানুয়ালি ফাইল ইন্সপেক্ট করা।
*   **Work**: দেখা গেছে একটি অতিরিক্ত ক্লোজিং `</div>` ট্যাগ ছিল যা `card-body` কে আগেই ক্লোজ করে দিচ্ছিল। এটি রিমুভ করায় লেআউট এবং ফুটার পজিশন ঠিক হয়েছে।
*   **Change**: `resources/views/backend/admin/editprofile.blade.php`.

## ৭. ভবিষ্যৎ পরিকল্পনা (To-Do)
*   **কিউ ব্যাচিং (Batching)**: ১০০০+ সাবস্ক্রাইবার হয়ে গেলে `Bus::batch` অথবা চাঙ্কিং (chunking) ব্যবহার করা যাতে টাইমআউট না হয়।
*   **ইমেইল লগ**: পাঠানো নিউজলেটারগুলোর হিস্ট্রি দেখার জন্য একটি ইউজার ইন্টারফেস (UI) তৈরি করা।
