<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::view('/{path?}', 'welcome')
//    ->where('path', '^((?!admin).)*$');
//
//Route::get('/{path?}', 'App\Http\Controllers\MainController@home')->name('login')->where('path', '^((?!admin).)*$');


Route::get('/route-cache', function () {
    Cache::flush();
    return 'Routes cache cleared';
});
Route::get('admin/login', 'App\Http\Controllers\MainController@login')->name('login');
Route::get('admin/register', 'App\Http\Controllers\MainController@register')->name('register');
Route::get('admin/dashboard', 'App\Http\Controllers\MainController@dashboard')->name('dashboard');
Route::post('admin/postLogin', 'App\Http\Controllers\MainController@postLogin')->name('postLogin');

Route::prefix('admin')->middleware('auth')->controller(MainController::class)
    ->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::post('/logout', 'logout')->name('logout');
        Route::get('/settings', 'settings')->name('settings');
        Route::post('/postSetting', 'postSetting')->name('postSetting');
        Route::get('/hero_section', 'hero_section')->name('hero_section');
        Route::post('/postHero_section', 'postHero_section')->name('postHero_section');
        Route::get('/feature_section', 'feature_section')->name('feature_section');
        Route::post('/postFeature_section', 'postFeature_section')->name('postFeature_section');
        Route::get('/multi_sec', 'multi_sec')->name('multi_sec');
        Route::post('/postMulti_sec', 'postMulti_sec')->name('postMulti_sec');
        Route::get('/blogs', 'blogs')->name('blogs');
        Route::get('/add_post', 'add_post')->name('add_post');
        Route::get('/edit_post/{id}', 'edit_post')->name('edit_post');
        Route::post('/blog_post', 'blog_post')->name('blog_post');
        Route::post('/delete_post', 'delete_post')->name('delete_post');
        Route::get('/download_page', 'download_page')->name('download_page');
        Route::post('/post_download', 'post_download')->name('post_download');
        Route::get('/home_video', 'home_video')->name('home_video');
        Route::post('/home_video_submit', 'home_video_submit')->name('home_video_submit');
        Route::get('/pages', 'pages')->name('pages');
        Route::post('/pages_submit', 'pages_submit')->name('pages_submit');

    });

//Front-end routes/
Route::controller(\App\Http\Controllers\FrontendController::class)
    ->group(function () {
        Route::get('/', 'homeData')->name('homeData');
        Route::get('blogs','blogs');
        Route::get('blog/{slug}','blog');
        Route::get('download','download');
        Route::get('about-us','about_us');
        Route::get('privacy-policy','privacy');
        Route::get('contact-us','contact');
        Route::get('{lang}','changeLang');
    });
