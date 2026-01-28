<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\HeroController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\PortfolioContorller;
use App\Http\Controllers\Backend\PortfolioPopupContorller;
use App\Http\Controllers\Backend\ResumeContorller;
use App\Http\Controllers\Backend\EducationContorller;
use App\Http\Controllers\Backend\MySkillContorller;
use App\Http\Controllers\Backend\TestimonialContorller;
use App\Http\Controllers\frontend\FrontEndController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PersonalDataController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SmtpSettingController;
use App\Http\Controllers\Backend\LiveChatSettingController;
use App\Http\Controllers\Backend\ThemeSettingController;
use App\Http\Controllers\Frontend\ChatController;
use App\Http\Controllers\Backend\ChatController as BackendChatController;
use App\Http\Controllers\Frontend\PortfolioController as FrontendPortfolioController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Backend\SubscriberController as BackendSubscriberController;
use App\Http\Controllers\Backend\QueueController;

Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::get('/portfolio/{id}', [FrontendPortfolioController::class, 'details'])->name('portfolio.details');
Route::get('/blog/details/{id}', [FrontendBlogController::class, 'details'])->name('blog.details');

// Frontend Chat Routes
Route::post('/chat/register', [ChatController::class, 'RegisterGuest']);
Route::get('/chat/check-status', [ChatController::class, 'CheckGuestStatus']);
Route::post('/chat/send', [ChatController::class, 'SendMessage']);
Route::get('/chat/get-messages', [ChatController::class, 'GetMessages']);
Route::post('/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');
Route::get('/unsubscribe/{email}/{token}', [SubscriberController::class, 'unsubscribe'])->name('unsubscribe');

Route::get('/dashboard', function () {
    return view('/backend/admin/index');
})->middleware(['auth', 'verified', 'twofactor'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('2fa', [App\Http\Controllers\TwoFactorController::class, 'index'])->name('2fa.index');
    Route::post('2fa', [App\Http\Controllers\TwoFactorController::class, 'store'])->name('2fa.store');
});

//admin logout
// Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::middleware('auth')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/edit-profile', 'editProfile')->name('admin.edit.profile');
        Route::get('/admin-logout', 'AdminLogout')->name('admin.logout');
        //admin.updateprofile
        Route::post('/update-profile/{id}', 'updateProfile')->name('admin.update.profile');
    });
});

//HeroController
Route::middleware('auth')->group(function () {
    Route::controller(HeroController::class)->group(function () {
        Route::get('/hero', 'index')->name('hero.index');
        Route::get('/hero/create', 'create')->name('hero.create');
        Route::post('/hero/store', 'store')->name('hero.store');
        Route::get('/hero/edit/{id}', 'edit')->name('hero.edit');
        Route::post('/hero/update/{id}', 'update')->name('hero.update');
        // Route::delete('/hero/destroy/{id}', 'destroy')->name('hero.destroy');
    });
});

//ServiceController
Route::middleware('auth')->group(function () {
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/service', 'index')->name('service.index');
        Route::get('/service/create', 'create')->name('service.create');
        Route::post('/service/store', 'store')->name('service.store');
        Route::get('/service/edit/{id}', 'edit')->name('service.edit');
        Route::post('/service/update/{id}', 'update')->name('service.update');
        // Route::delete('/service/destroy/{id}', 'destroy')->name('service.destroy');
        Route::get('/service/{id}/popup', 'popup')->name('service.popup');
    });
});

//PortfolioContorller
Route::middleware('auth')->group(function () {
    Route::controller(PortfolioContorller::class)->group(function () {
        Route::get('/portfolio', 'index')->name('portfolio.index');
        Route::get('/portfolio/create', 'create')->name('portfolio.create');
        Route::post('/portfolio/store', 'store')->name('portfolio.store');
        Route::get('/portfolio/edit/{id}', 'edit')->name('portfolio.edit');
        Route::post('/portfolio/update/{id}', 'update')->name('portfolio.update');
        // Route::delete('/portfolio/destroy/{id}', 'destroy')->name('portfolio.destroy');
    });
});
//PortfolioPopupContorller
Route::middleware('auth')->group(function () {
    Route::controller(PortfolioPopupContorller::class)->group(function () {
        // Route::get('/portfolio/popup', 'index')->name('portfolio.popup.index');
        // Route::get('/portfolio/popup/create', 'create')->name('portfolio.popup.create');
        // Route::post('/portfolio/popup/store', 'store')->name('portfolio.popup.store');
        // Route::get('/portfolio/popup/edit/{id}', 'edit')->name('portfolio.popup.edit');
        // Route::post('/portfolio/popup/update/{id}', 'update')->name('portfolio.popup.update');
        // Route::delete('/portfolio/popup/destroy/{id}', 'destroy')->name('portfolio.popup.destroy');
    });
});

//ResumeContorller
Route::middleware('auth')->group(function () {
    Route::controller(ResumeContorller::class)->group(function () {
        Route::get('/resume', 'index')->name('resume.index');
        Route::get('/resume/create', 'create')->name('resume.create');
        Route::post('/resume/store', 'store')->name('resume.store');
        Route::get('/resume/edit/{id}', 'edit')->name('resume.edit');
        Route::post('/resume/update/{id}', 'update')->name('resume.update');
        // Route::delete('/resume/destroy/{id}', 'destroy')->name('resume.destroy');
    });
});

//EducationContorller
Route::middleware('auth')->group(function () {
    Route::controller(EducationContorller::class)->group(function () {
        Route::get('/education', 'index')->name('education.index');
        Route::get('/education/create', 'create')->name('education.create');
        Route::post('/education/store', 'store')->name('education.store');
        Route::get('/education/edit/{id}', 'edit')->name('education.edit');
        Route::post('/education/update/{id}', 'update')->name('education.update');
        // Route::delete('/education/destroy/{id}', 'destroy')->name('education.destroy');
    });
});

//MySkillContorller
Route::middleware('auth')->group(function () {
    Route::controller(MySkillContorller::class)->group(function () {
        Route::get('/myskill', 'index')->name('myskill.index');
        Route::get('/myskill/create', 'create')->name('myskill.create');
        Route::post('/myskill/store', 'store')->name('myskill.store');
        Route::get('/myskill/edit/{id}', 'edit')->name('myskill.edit');
        Route::post('/myskill/update/{id}', 'update')->name('myskill.update');
        // Route::delete('/myskill/destroy/{id}', 'destroy')->name('myskill.destroy');
    });
});

//TestimonialContorller
Route::middleware('auth')->group(function () {
    Route::controller(TestimonialContorller::class)->group(function () {
        Route::get('/testimonial', 'index')->name('testimonial.index');
        Route::get('/testimonial/create', 'create')->name('testimonial.create');
        Route::post('/testimonial/store', 'store')->name('testimonial.store');
        Route::get('/testimonial/edit/{id}', 'edit')->name('testimonial.edit');
        Route::post('/testimonial/update/{id}', 'update')->name('testimonial.update');
        // Route::delete('/testimonial/destroy/{id}', 'destroy')->name('testimonial.destroy');
    });
});

//PersonalDataController
Route::middleware('auth')->group(function () {
    Route::controller(PersonalDataController::class)->group(function () {
        Route::get('/personaldata', 'index')->name('personaldata.index');
        Route::get('/personaldata/create', 'create')->name('personaldata.create');
        Route::post('/personaldata/store', 'store')->name('personaldata.store');
        Route::get('/personaldata/edit/{id}', 'edit')->name('personaldata.edit');
        Route::post('/personaldata/update/{id}', 'update')->name('personaldata.update');
        // Route::delete('/personaldata/destroy/{id}', 'destroy')->name('personaldata.destroy');
    });
});

//BlogController
Route::middleware('auth')->group(function () {
    Route::controller(BlogController::class)->group(function () {
        Route::get('/blog', 'index')->name('blog.index');
        Route::get('/blog/create', 'create')->name('blog.create');
        Route::post('/blog/store', 'store')->name('blog.store');
        Route::get('/blog/edit/{id}', 'edit')->name('blog.edit');
        Route::post('/blog/update/{id}', 'update')->name('blog.update');
        Route::get('/blog/delete/{id}', 'destroy')->name('blog.delete');
        Route::post('/blog/upload-image', 'uploadImage')->name('blog.upload.image');
    });
});

//ContactController
Route::middleware('auth')->group(function () {
    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact', 'index')->name('contact.index');
        Route::get('/contact/delete/{id}', 'destroy')->name('contact.delete');
        Route::post('/contact/reply/{id}', 'reply')->name('contact.reply');
    });
});

//ThemeSettingController
Route::middleware('auth')->group(function () {
    Route::controller(ThemeSettingController::class)->group(function () {
        Route::get('/theme/setting', 'index')->name('theme.index');
        Route::post('/theme/update', 'update')->name('theme.update');
    });
});

//SettingController
Route::middleware('auth')->group(function () {
    Route::controller(SettingController::class)->group(function () {
        Route::get('/setting', 'index')->name('setting.index');
        Route::post('/setting/update', 'update')->name('setting.update');
    });
});

//SmtpSettingController
Route::middleware('auth')->group(function () {
    Route::controller(SmtpSettingController::class)->group(function () {
        Route::get('/smtp/setting', 'SmtpSetting')->name('smtp.setting');
        Route::post('/smtp/update', 'UpdateSmtpSetting')->name('update.smtp.setting');
    });
});

//LiveChatSettingController
Route::middleware('auth')->group(function () {
    Route::controller(LiveChatSettingController::class)->group(function () {
        Route::get('/live/chat/setting', 'LiveChatSetting')->name('live.chat.setting');
        Route::post('/live/chat/update', 'UpdateLiveChatSetting')->name('update.live.chat.setting');
    });
    
    // Admin Chat Inbox
    Route::get('/admin/chat/inbox', [BackendChatController::class, 'ChatInbox'])->name('admin.chat.inbox');
    Route::get('/admin/chat/get-messages/{sessionId}', [BackendChatController::class, 'GetConversation'])->name('admin.chat.get');
    Route::post('/admin/chat/reply', [BackendChatController::class, 'AdminReply'])->name('admin.chat.reply');
});

//SubscriberController
Route::middleware('auth')->group(function () {
    Route::controller(BackendSubscriberController::class)->group(function () {
        Route::get('/subscribers', 'index')->name('subscriber.index');
        Route::get('/subscribers/delete/{id}', 'destroy')->name('subscriber.delete');
        Route::get('/subscribers/newsletter', 'newsletter')->name('subscriber.newsletter');
        Route::post('/subscribers/send-newsletter', 'sendNewsletter')->name('subscriber.send');
    });
});

//Queue Management
Route::middleware('auth')->group(function () {
    Route::controller(QueueController::class)->group(function () {
        Route::get('/queue', 'index')->name('queue.index');
        Route::post('/queue/start', 'startWorker')->name('queue.start');
        Route::post('/queue/stop', 'stopWorker')->name('queue.stop');
        Route::post('/queue/retry/{id}', 'retryJob')->name('queue.retry');
        Route::delete('/queue/delete/{id}', 'deleteJob')->name('queue.delete');
        Route::delete('/queue/delete-all-failed', 'deleteAllFailed')->name('queue.delete.all.failed');
    });
});

//Security Management
Route::middleware('auth')->group(function () {
    Route::controller(App\Http\Controllers\Backend\SecurityController::class)->group(function () {
        Route::get('/security/setting', 'index')->name('security.setting');
        Route::post('/security/update', 'update')->name('security.update');
    });
});

require __DIR__.'/auth.php';
