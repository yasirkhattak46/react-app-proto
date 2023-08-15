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
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function home()
    {
        $data['status'] = "Success";
        $data['result']['app_url'] = env("APP_URL");
        $data['result']['settings'] = Settings::get()[0];
        return view('welcome', $data);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->passes()) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $data['status'] = "Success";
                $data['result'] = "Logged in Successfully";
            } else {
                $data['status'] = "Failure";
                $data['result'] = "Invalid Credentials";
            }
        } else {
            $data['status'] = "validator";
            $data['result'] = $validator->errors()->toJson();
        }
        return response($data);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('admin/login');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function register_submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        if ($validator->passes()) {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);
            $data['status'] = "Success";
            $data['result'] = "Registered Successfully";
        } else {
            $data['status'] = "validator";
            $data['result'] = $validator->errors()->toJson();
        }
        return response($data);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }


    public function settings()
    {
        $data['setting'] = Settings::first();
        return view('admin.settings', $data);
    }

    public function postSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'primary_color' => 'required',
            'secondary_color' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'email' => 'required',

        ]);
        if ($validator->passes()) {
            if ($request->file('logo')) {
                $image = time() . rand(1, 100) . '.' . $request->logo->extension();
                $request->logo->move(public_path('assets/images'), $image);
            } else {
                if ($request->id) {
                    $image = Settings::where('id', $request->id)->pluck('logo')->first();
                } else {
                    $image = null;
                }
            }
            Settings::updateOrCreate([
                'id' => $request->id,
            ], [
                'logo' => $image,
                'primary_color' => $request->primary_color,
                'secondary_color' => $request->secondary_color,
                'header_script' => $request->header_script,
                'footer_script' => $request->footer_script,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
                'email' => $request->email,
            ]);
            $data['status'] = "Success";
            $data['result'] = "Update Successfully";
        } else {
            $data['status'] = "validator";
            $data['result'] = $validator->errors()->toJson();
        }
        return response($data);

    }

    public function hero_section()
    {
        $data['hero_sec'] = HomeHeroSection::first();
        return view('admin.home_hero', $data);

    }

    public function postHero_section(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'sub_title' => 'required',
            'btn_text' => 'required',
            'description' => 'required',
            'btn_link' => 'required'
        ]);
        if ($validator->passes()) {
            try {
                if ($request->file('banner')) {
                    $banner = time() . rand(1, 100) . '.' . $request->banner->extension();
                    $request->banner->move(public_path('assets/images'), $banner);
                } else {
                    if ($request->id) {
                        $banner = HomeHeroSection::where('id', $request->id)->pluck('banner')->first();
                    } else {
                        $banner = null;
                    }
                }
                $i = 0;
                if (isset($request->icons) && count($request->icons) > 0) {
                    foreach ($request->icons as $key => $icon) {
                        if ($key == 'old') {
                            foreach ($icon as $old_icon) {
                                $icons[$i]['text'] = $old_icon['text'];
                                $icons[$i]['image'] = $old_icon['image'];
                                $i++;
                            }
                        }
                        if (isset($icon['image']) && $icon['text']) {
                            $image = time() . rand(1, 100) . '.' . $icon['image']->extension();
                            $icon['image']->move(public_path('assets/images'), $image);
                            $icons[$i]['text'] = $icon['text'];
                            $icons[$i]['image'] = $image;
                        }

                        $i++;
                    }
                    if (isset($icons)) {
                        $icons_var = json_encode($icons);
                    } else {
                        $icons_var = null;
                    }
                } else {
                    $icons_var = null;
                }

                HomeHeroSection::updateOrCreate([
                    'id' => $request->id,
                ], [
                    'title' => $request->title,
                    'sub_title' => $request->sub_title,
                    'btn_text' => $request->btn_text,
                    'icon_title' => $request->icon_title,
                    'btn_link' => $request->btn_link,
                    'icons' => $icons_var,
                    'description' => $request->description,
                    'banner' => $banner,
                ]);
                $data['status'] = "Success";
                $data['result'] = "Update Successfully";
            } catch (\Exception $exception) {
                $data['status'] = "Failure";
                $data['result'] = $exception;
            }
        } else {
            $data['status'] = "validator";
            $data['result'] = $validator->errors()->toJson();
        }
        return response($data);

    }

    public function feature_section()
    {
        $data['feature_sec'] = HomeFeaturesSection::first();
        return view('admin.home_feature', $data);
    }

    public function postFeature_section(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'icons_title' => 'required',
            'icons' => 'required|array',
            'icons.*.text' => 'required|string',
            'icons.*.image' => 'required',
        ]);
        if ($validator->passes()) {
            try {
                $i = 0;
                if (isset($request->icons) && count($request->icons) > 0) {
                    foreach ($request->icons as $key => $icon) {
                        if ($key == 'old') {
                            foreach ($icon as $old_icon) {
                                $icons[$i]['text'] = $old_icon['text'];
                                $icons[$i]['image'] = $old_icon['image'];
                                $i++;
                            }
                        }
                        if (isset($icon['image']) && $icon['text']) {
                            $image = time() . rand(1, 100) . '.' . $icon['image']->extension();
                            $icon['image']->move(public_path('assets/images'), $image);
                            $icons[$i]['text'] = $icon['text'];
                            $icons[$i]['image'] = $image;
                        }
                        $i++;
                    }
                    if (isset($icons)) {
                        $icons_var = json_encode($icons);
                    } else {
                        $icons_var = null;
                    }
                } else {
                    $icons_var = null;
                }
                HomeFeaturesSection::updateOrCreate([
                    'id' => $request->id,
                ], [
                    'title' => $request->title,
                    'description' => $request->description,
                    'icons_title' => $request->icons_title,
                    'icons' => $icons_var,
                ]);
                $data['status'] = "Success";
                $data['result'] = "Update Successfully";
            } catch (\Exception $exception) {
                $data['status'] = "Failure";
                $data['result'] = "Something Went Wrong";
            }
        } else {
            $data['status'] = "validator";
            $data['result'] = $validator->errors()->toJson();
        }
        return response($data);

    }

    public function multi_sec()
    {
        $data['multi_sec'] = HomeMultiSec::first();
        return view('admin.multi_section', $data);
    }

    public function postMulti_sec(Request $request)
    {
        try {
//            Color Content
            if (isset($request->color_content) && count($request->color_content) > 0) {
                foreach ($request->color_content as $key => $color_c) {
                    if (isset($color_c['image'])) {
                        $image = time() . rand(1, 100) . '.' . $color_c['image']->extension();
                        $color_c['image']->move(public_path('assets/images'), $image);
                    } else {
                        $image = null;
                    }
                    if ($color_c['title'] != null) {
                        $new_array[$key]['title'] = $color_c['title'];
                        $new_array[$key]['description'] = $color_c['description'];
                        $new_array[$key]['image'] = $image;
                    }
                }
                $new_color_content = json_encode($new_array);
            } else {
                $new_color_content = null;
            }

//            FAQS
            if (isset($request->faqs) && count($request->faqs) > 0) {
                foreach ($request->faqs as $key => $faq) {
                    if (isset($faq['question']) && $faq['answer']) {
                        $faqs[$key]['question'] = $faq['question'];
                        $faqs[$key]['answer'] = $faq['answer'];
                    }
                }
                if (isset($faqs) && count($faqs) > 0) {
                    $faqs_var = json_encode($faqs);
                } else {
                    $faqs_var = null;
                }
            } else {
                $faqs_var = null;
            }


//            Other APPS
            $i = 0;
            if (isset($request->apps_icon) && count($request->apps_icon) > 0) {
                foreach ($request->apps_icon as $key => $icon) {
                    if ($key == 'old') {
                        foreach ($icon as $old_icon) {
                            $icons[$i]['text'] = $old_icon['text'];
                            $icons[$i]['image'] = $old_icon['image'];
                            $i++;
                        }
                    }
                    if (isset($icon['image']) && $icon['text']) {
                        $image = time() . rand(1, 100) . '.' . $icon['image']->extension();
                        $icon['image']->move(public_path('assets/images'), $image);
                        $icons[$i]['text'] = $icon['text'];
                        $icons[$i]['image'] = $image;
                    }
                    $i++;
                }
                if (isset($icons)) {
                    $icons_var = json_encode($icons);
                } else {
                    $icons_var = null;
                }
            } else {
                $icons_var = null;
            }
            HomeMultiSec::updateOrCreate([
                'id' => $request->id,
            ], [
                'color_content' => $new_color_content,
                'apps_title' => $request->apps_title,
                'apps_icon' => $icons_var,
                'faq_title' => $request->faq_title,
                'faqs' => $faqs_var,
                'content' => $request->main_content,
            ]);
            $data['status'] = "Success";
            $data['result'] = "Update Successfully";
        } catch (\Exception $exception) {
            $data['status'] = "Failure";
            $data['result'] = $exception;
        }
        return response($data);

    }

    public function blogs()
    {
        $data['blogs'] = Blog::all();
        return view('admin.blogs', $data);
    }

    public function add_post()
    {
        return view('admin.add_post');
    }

    public function blog_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required_without:id',
            'main_content' => 'required',
            'slug' => 'required',

        ]);
        if ($validator->passes()) {
            try {
                if ($request->file('image')) {
                    $image = time() . rand(1, 100) . '.' . $request->image->extension();
                    $request->image->move(public_path('assets/images'), $image);
                } else {
                    if ($request->id) {
                        $image = Blog::where('id', $request->id)->pluck('image')->first();
                    } else {
                        $image = null;
                    }
                }
                Blog::updateOrCreate([
                    'id' => $request->id,
                ], [
                    'image' => $image,
                    'title' => $request->title,
                    'keywords' => $request->keywords,
                    'description' => $request->description,
                    'slug' => $request->slug,
                    'status' => $request->status,
                    'main_content' => $request->main_content,
                ]);
                $data['status'] = "Success";
                $data['result'] = "Update Successfully";
            } catch (Exception $exception) {
                $data['status'] = "Failure";
                $data['result'] = $exception;
            }
        } else {
            $data['status'] = "validator";
            $data['result'] = $validator->errors()->toJson();
        }
        return response($data);
    }

    public function delete_post(Request $request)
    {
        try {
            Blog::find($request->id)->delete();
            $data['status'] = "Success";
            $data['result'] = "Delete Successfully";
        } catch (Exception $exception) {
            $data['status'] = "Failure";
            $data['result'] = $exception;
        }
        return response($data);
    }

    public function edit_post($id)
    {
        $data['post'] = Blog::where('id', $id)->first();
        return view('admin.add_post', $data);
    }

    public function download_page()
    {
        $data['download'] = download::first();
        return view('admin.download_page', $data);
    }

    public function post_download(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'downloads' => 'required',
            'main_content' => 'required',
        ]);
        if ($validator->passes()) {
            try {
//            button Links
                if (isset($request->downloads) && count($request->downloads) > 0) {
                    foreach ($request->downloads as $key => $download) {
                        if (isset($download['text']) && $download['link']) {
                            $downloads[$key]['text'] = $download['text'];
                            $downloads[$key]['link'] = $download['link'];
                        }
                    }
                    if (isset($downloads) && count($downloads) > 0) {
                        $download_var = json_encode($downloads);
                    } else {
                        $download_var = null;
                    }
                } else {
                    $download_var = null;
                }
                download::updateOrCreate([
                    'id' => $request->id,
                ], [
                    'title' => $request->title,
                    'description' => $request->description,
                    'downloads' => $download_var,
                    'main_content' => $request->main_content,
                ]);
                $data['status'] = "Success";
                $data['result'] = "Update Successfully";
            } catch (\Exception $exception) {
                $data['status'] = "Failure";
                $data['result'] = $exception;
            }
        } else {
            $data['status'] = "validator";
            $data['result'] = $validator->errors()->toJson();
        }
        return response($data);

    }

    function home_video()
    {
        $data['home_video'] = Home_video::first();
        return view('admin.home_video', $data);
    }

    public function home_video_Submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required_without:id',
            'description' => 'required',
            'video_id' => 'required',
            'thumbnail' => 'required_without:id',
            'content' => 'required'
        ]);
        if ($validator->passes()) {
            try {
                if ($request->file('thumbnail')) {
                    $thumbnail = time() . rand(1, 100) . '.' . $request->thumbnail->extension();
                    $request->thumbnail->move(public_path('assets/images'), $thumbnail);
                } else {
                    $thumbnail = Home_video::where('id', $request->id)->pluck('thumbnail')->first();
                }
                if ($request->file('image')) {
                    $image = time() . rand(1, 100) . '.' . $request->image->extension();
                    $request->image->move(public_path('assets/images'), $image);
                } else {
                    $image = Home_video::where('id', $request->id)->pluck('image')->first();
                }
                Home_video::updateOrCreate([
                    'id' => $request->id,
                ], [
                    'title' => $request->title,
                    'description' => $request->description,
                    'content' => $request->content,
                    'video_id' => $request->video_id,
                    'thumbnail' => $thumbnail,
                    'image' => $image,
                ]);
                $data['status'] = "Success";
                $data['result'] = "Update Successfully";
            } catch (Exception $ex) {
                $data['status'] = "Failure";
                $data['result'] = $ex;
            }
        } else {
            $data['status'] = "validator";
            $data['result'] = $validator->errors()->toJson();
        }
        return response($data);
    }

    public function pages()
    {
        $data['pages'] = Pages::first();
        return view('admin.pages', $data);
    }

    public function pages_submit(Request $request)
    {
        try {
            Pages::updateOrCreate([
                'id' => $request->id,
            ], [
                'about_us' => $request->about_us,
                'privacy_policy' => $request->privacy_policy,
                'contact' => $request->contact,
            ]);
            $data['status'] = "Success";
            $data['result'] = "Update Successfully";
        } catch (Exception $ex) {
            $data['status'] = "Failure";
            $data['result'] = $ex;
        }
        return response($data);

    }
}
