<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TestimonialController;


Route::view('/', 'front.index')->name('index');
Route::view('about', 'front.about')->name('about');
Route::view('contact', 'front.contact')->name('contact');
Route::view('resume', 'front.resume')->name('resume');
Route::view('services', 'front.services')->name('services');
Route::view('portfolio', 'front.portfolio')->name('portfolio');
Route::view('/portfolio-details/{id}', 'front.portfolio-details')->name('portfolio.details');
Route::post('/contact/send', [AboutController::class, 'send'])->name('contact.send');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('admin')->as('admin.')->group(function () {

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::put('link-update', [\App\Http\Controllers\ProfileController::class, 'link'])->name('link.update');


    Route::view('setting', 'settings.index')->name('setting');
    Route::view('/social-links/edit/{id}', 'settings.edit')->name('social-links.edit');


    Route::get('about', [AboutController::class, 'index'])->name('about');
    Route::get('about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('about', [AboutController::class, 'store'])->name('about.store');
    Route::get('about/{about}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('about/{about}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('about/{about}', [AboutController::class, 'destroy'])->name('about.destroy');

    Route::get('skill', [SkillController::class, 'index'])->name('skill');
    Route::get('skill/create', [SkillController::class, 'create'])->name('skill.create');
    Route::post('skill', [SkillController::class, 'store'])->name('skill.store');
    Route::get('skill/{skill}/edit', [SkillController::class, 'edit'])->name('skill.edit');
    Route::put('skill/{skill}', [SkillController::class, 'update'])->name('skill.update');
    Route::delete('skill/{skill}', [SkillController::class, 'destroy'])->name('skill.destroy');

    Route::get('stat', [StatController::class, 'index'])->name('stat');
    Route::get('stat/create', [StatController::class, 'create'])->name('stat.create');
    Route::post('stat', [StatController::class, 'store'])->name('stat.store');
    Route::get('stat/{stat}/edit', [StatController::class, 'edit'])->name('stat.edit');
    Route::put('stat/{stat}', [StatController::class, 'update'])->name('stat.update');
    Route::delete('stat/{stat}', [StatController::class, 'destroy'])->name('stat.destroy');

    Route::get('testimonial', [TestimonialController::class, 'index'])->name('testimonial');
    Route::get('testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('testimonial/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('testimonial/{testimonial}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('testimonial/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');

    Route::get('resume', [ResumeController::class, 'index'])->name('resume');
    Route::get('resume/edit', [ResumeController::class, 'edit'])->name('resume.edit');
    Route::put('resume/update', [ResumeController::class, 'update'])->name('resume.update');

    Route::get('services', [ServiceController::class, 'index'])->name('services');
    Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

    Route::get('portfolios', [PortfolioController::class, 'index'])->name('portfolios');
    Route::get('portfolios/create', [PortfolioController::class, 'create'])->name('portfolios.create');
    Route::post('portfolios', [PortfolioController::class, 'store'])->name('portfolios.store');
    Route::get('portfolios/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('portfolios.edit');
    Route::put('portfolios/{portfolio}', [PortfolioController::class, 'update'])->name('portfolios.update');
    Route::delete('portfolios/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolios.destroy');
});
