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

Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::post('/submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/dashboard', function () {
    return view('/backend/admin/index');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    });
});

//ContactController
Route::middleware('auth')->group(function () {
    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact', 'index')->name('contact.index');
        Route::get('/contact/delete/{id}', 'destroy')->name('contact.delete');
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

require __DIR__ . '/auth.php';
