<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
});

Route::group(['middleware' => ['auth', 'domain'] ], function(){
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
    Route::post('/profile/update/{id}', [ProfileController::class, 'profile_store'])->name('profile.update');
    Route::post('/change/password', [ProfileController::class, 'change_password'])->name('change.password');
});


Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin', 'domain']], function (){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [AdminController::class, 'profile_store'])->name('profile.update');
    Route::post('/change/password', [AdminController::class, 'change_password'])->name('change.password');

    // Posts route
    Route::get('/posts/all', [PostsController::class, 'index'])->name('posts');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/update/{id}', [PostsController::class, 'update'])->name('posts.update');
    Route::get('/posts/delete/{id}', [PostsController::class, 'destroy'])->name('posts.delete');

    // admin category route
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'dalete'])->name('category.delete');

    Route::get('/service/create', [ServicesController::class, 'add_form'])->name('service.create');
    Route::post('/service/store', [ServicesController::class, 'store'])->name('service.store');
    Route::get('/service', [ServicesController::class, 'index'])->name('service');
    Route::get('/service/edit/{id}', [ServicesController::class, 'edit'])->name('service.edit');
    Route::post('/service/update/{id}', [ServicesController::class, 'update'])->name('service.update');
    Route::get('/service/delete/{id}', [ServicesController::class, 'delete'])->name('service.delete');

    Route::get('/order', [OrdersController::class, 'index'])->name('order');
    Route::get('/order/new', [OrdersController::class, 'new_order'])->name('order.new');
    Route::post('/order/store', [OrdersController::class, 'store'])->name('order.store');
    Route::get('/order/edit/{id}', [OrdersController::class, 'edit'])->name('order.edit');
    Route::post('/order/update/{id}', [OrdersController::class, 'update'])->name('order.update');
    Route::get('/order/delete/{id}', [OrdersController::class, 'delete'])->name('order.delete');
    Route::get('/order/pending', [OrdersController::class, 'pending'])->name('order.pending');


    Route::get('/order/approved', [OrdersController::class, 'approved'])->name('order.approved');
    Route::get('/order/approved/update/{id}', [OrdersController::class, 'approved_update'])->name('order.approved.update');
    Route::get('/order/running', [OrdersController::class, 'running'])->name('order.running');
    Route::get('/order/running/update/{id}', [OrdersController::class, 'running_update'])->name('order.running.update');
    Route::get('/order/show/{id}', [OrdersController::class, 'show'])->name('order.show');
    Route::get('/order/closed', [OrdersController::class, 'closed'])->name('order.closed');
    Route::get('/order/print/{id}', [OrdersController::class, 'print'])->name('order.print');
    Route::get('/order/pdf/{id}', [OrdersController::class, 'pdf_download'])->name('order.pdf');


    // Orders Export route
    Route::get('/orders/export/', [OrdersController::class, 'export'])->name('orders.export');
    Route::get('/orders/export/pending', [OrdersController::class, 'exportPending'])->name('orders.export.pending');
    Route::get('/orders/export/approved', [OrdersController::class, 'exportApproved'])->name('orders.export.approved');
    Route::get('/orders/export/running', [OrdersController::class, 'exportRunning'])->name('orders.export.running');
    Route::get('/orders/export/closed', [OrdersController::class, 'exportClosed'])->name('orders.export.closed');

    Route::get('/slider', [SliderController::class, 'index'])->name('slider');
    Route::post('/slider/update', [SliderController::class, 'update'])->name('slider.update');

    // Testimonial
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('/testimonial/update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::get('/testimonial/delete/{id}', [TestimonialController::class, 'delete'])->name('testimonial.delete');

    Route::get('/settings/general', [SettingsController::class, 'general'])->name('settings.general');
    Route::post('/settings/general/update', [SettingsController::class, 'general_update'])->name('setting.general.update');
    Route::post('/settings/image_update', [SettingsController::class, 'image_update'])->name('settings.image_update');

    Route::get('web-setting/about', [PagesController::class, 'about'])->name('web-setting.about');
    Route::post('web-setting/about/store', [PagesController::class, 'about_store'])->name('web-setting.about.store');
    Route::get('web-setting/terms', [PagesController::class, 'terms'])->name('web-setting.terms');
    Route::post('web-setting/terms/store', [PagesController::class, 'terms_store'])->name('web-setting.terms.store');

    Route::get('web-setting/privacy', [PagesController::class, 'privacy'])->name('web-setting.privacy');
    Route::post('web-setting/privacy/store', [PagesController::class, 'privacy_store'])->name('web-setting.privacy.store');

    Route::get('web-setting/circution', [PagesController::class, 'circution'])->name('web-setting.circution');
    Route::post('web-setting/circution/store', [PagesController::class, 'circution_store'])->name('web-setting.circution.store');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/contact/pending', [ContactController::class, 'pending'])->name('contact.pending');
    Route::get('/contact/closed', [ContactController::class, 'closed'])->name('contact.closed');
    Route::get('/contact/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('/contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::get('/contact/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
});


require __DIR__.'/auth.php';

Route::middleware('domain')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/category/{slug}', [HomeController::class,'serviceByCategory'])->name('category.services');
    Route::get('/service/{slug}', [HomeController::class,'serviceDetails'])->name('service_detail');
    Route::get('/posts/{slug}', [HomeController::class,'single_post'])->name('single_post');
    Route::post('/order/store', [HomeController::class, 'order_store'])->name('order.store');

    Route::get('posts', [HomeController::class, 'posts'])->name('posts');

    Route::post('/subscribe/store', [HomeController::class,'subscribeStore'])->name('subscribe.store');

    Route::get('/contact', [HomeController::class,'contact'])->name('contact');
    Route::post('/contact/store', [HomeController::class,'contactStore'])->name('contact.store');

    Route::get('/about', [HomeController::class,'about'])->name('about');
    Route::get('/faq', [HomeController::class,'faq'])->name('faq');
    Route::get('/privacy-policy', [HomeController::class,'privacy_policy'])->name('privacy-policy');
    Route::get('/terms', [HomeController::class,'terms'])->name('terms');

});


