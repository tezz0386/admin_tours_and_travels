<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner\Banner;
use App\Models\Admin\Blog\Blog;
use App\Models\Admin\Destination\Destination;
use App\Models\Admin\FAQ\Faq;
use App\Models\Admin\Member\Member;
use App\Models\Admin\Package\Package;
use App\Models\Admin\Package\PackageCategory;
use App\Models\Admin\Page\Page;
use App\Models\Admin\Testimonial\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function getBanners()
    {
        return Banner::orderByDesc('created_at')->get();
    }
    public function getDestinations()
    {
        return Destination::orderByDesc('created_at')->limit(6)->get();
    }
    public function getPage($page)
    {
        return Page::where('title', $page)->first();
    }
    public function getOffPackages()
    {
        return Package::orderByDesc('created_at')->where('is_off', true)->get();
    }
    public function getMembers()
    {
        return Member::orderByDesc('created_at')->get();
    }
    public function getPackageWithCategory()
    {
        return PackageCategory::orderByDesc('created_at')->get();
    }
    public function getTestimonials()
    {
        return Testimonial::orderByDesc('created_at')->where('status', true)->get();
    }
    public function getFAQs()
    {
        return Faq::orderByDesc('created_at')->where('status', true)->get();
    }
    public function index()
    {
    	return view('welcome', [
            'banners'=>$this->getBanners(),
            'about'=>$this->getPage('About Us'),
            'destinations'=>$this->getDestinations(),
            'packages'=>$this->getOffPackages(),
            'members'=>$this->getMembers(),
            'packageWithCategory'=>$this->getPackageWithCategory(),
            'page'=>'home',
            'testimonials'=>$this->getTestimonials(),
        ]);
    }
    public function getSinglePackage($slug)
    {
        $package = Package::where('slug', $slug)->first();
        return view('frontend.single-trip', [
            'package'=>$package,
            'page'=>'booking',
            'packageCategories'=>$this->getPackageWithCategory(),
        ]);
    }
    public function getBlogs($n)
    {
        return Blog::orderByDesc('created_at')->paginate($n);
    }
    public function getBlog()
    {
        return view('frontend.blog', [
            'pageInfo'=>$this->getPage('Blog'),
            'page'=>'blog',
            'packageCategories'=>$this->getPackageWithCategory(),
            'blogs'=>$this->getBlogs(5),
        ]);
    }
    public function getAbout()
    {
        return view('frontend.about', [
            'about'=>$this->getPage('About Us'),
            'page'=>'about',
        ]);
    }
    public function getContact()
    {
        return view('frontend.contact', [
            'page'=>'contact',
            'pageInfo'=>$this->getPage('About Us'),
        ]);
    }
    public function getFAQ()
    {
        return view('frontend.faq', [
            'page'=>'faq',
            'faqs'=>$this->getFaqs(),
            'pageInfo'=>$this->getPage('FAQ'),
        ]);
    }

}
