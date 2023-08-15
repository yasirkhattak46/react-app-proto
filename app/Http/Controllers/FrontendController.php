<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\download;
use App\Models\Home_video;
use App\Models\HomeFeaturesSection;
use App\Models\HomeHeroSection;
use App\Models\HomeMultiSec;
use App\Models\Pages;
use App\Models\Settings;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homeData()
    {
        $data['settings'] = Settings::first();
        $data['hero'] = HomeHeroSection::first();
        $data['feature'] = HomeFeaturesSection::first();
        $data['multiSec'] = HomeMultiSec::first();
        $data['blogs'] = Blog::latest()->take(4)->get();
        $data['homeVideo'] = Home_video::first();
        return view('frontend.index', $data);
    }

    public function blog($slug)
    {
        $data['settings'] = Settings::first();
        $data['blogs'] = Blog::where('status', 1)->latest()->take(4)->get();
        $data['blog'] = Blog::where('slug', $slug)->first();
        return view('frontend.single_blog', $data);
    }

    public function blogs()
    {
        $data['settings'] = Settings::first();
        $data['blogs'] = Blog::where('status', 1)->latest()->get();
        return view('frontend.blogs', $data);
    }

    public function download()
    {
        $data['settings'] = Settings::first();
        $data['download'] = download::first();
        return view('frontend.download', $data);
    }

    public function about_us()
    {
        $data['settings'] = Settings::first();
        $data['about'] = Pages::first()->pluck('about_us');
        return view('frontend.about', $data);
    }

    public function privacy()
    {
        $data['settings'] = Settings::first();
        $data['privacy'] = Pages::first()->pluck('privacy_policy');
        return view('frontend.privacy', $data);
    }

    public function contact()
    {
        $data['settings'] = Settings::first();
        $data['contact'] = Pages::first()->pluck('contact');
        return view('frontend.contact', $data);
    }

    public function changeLang($lang)
    {
        session()->put('locale', $lang);
        $data['settings'] = Settings::first();
        $data['hero'] = HomeHeroSection::first();
        $data['feature'] = HomeFeaturesSection::first();
        $data['multiSec'] = HomeMultiSec::first();
        $data['blogs'] = Blog::latest()->take(4)->get();
        $data['homeVideo'] = Home_video::first();
        return view('frontend.index', $data);
    }
}
