<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

use App\Models\SiteInfo as Setting;
use App\Models\Social;
use App\Models\Admin;
use App\Models\About;
use App\Models\ContactInfo;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Skill;
use App\Models\Counter;
use App\Models\Certificate;
use App\Models\Service;
use App\Models\BlogPost;


use SweetAlert;
use Alert;
use Log;
use Carbon\Carbon;;

class PageController extends Controller
{
    //

    public function welcome() {
        $about= About::get();
        $counter = Counter::all();
        $socials = Social::all();
        $service = Service::all();
        return view('welcome',[
            'about' => $about,
            'counter' => $counter,
            'socials' => $socials,
            'service' => $service, 
        ]);
    }

    public function about() {
        $about= About::get();
        $socials = Social::all();
        $experience = Experience::orderBy('end_year', 'desc')->get();
        $education = Education::orderBy('end_year', 'desc')->get();
        return view('about',[
            'about' => $about,
            'socials' => $socials,
            'experience' => $experience,
            'education' => $education
        ]);
    }

    public function contact() {
        $socials = Social::all();
        $contacts = ContactInfo::all();
        return view('contact',[
            'socials' => $socials,
            'contacts' =>$contacts
        ]);
    }

    public function credentials() {
        $socials = Social::all();
        $about = About::get();
        $skill = Skill::all();
        $certificate = Certificate::orderBy('date', 'desc')->get();
        $experience = Experience::orderBy('end_year', 'desc')->get();
        $education = Education::orderBy('end_year', 'desc')->get();
        return view('credentials',[
            'socials' => $socials,
            'about' => $about,
            'skill' => $skill,
            'certificate' => $certificate,
            'experience' => $experience,
            'education' => $education
        ]);
    }

    public function project() {
        $projects = Project::with('images')->get();
        return view('project',[
            'projects' => $projects,
        ]);
    }

    public function services() {
        $socials = Social::all();
        $service = Service::all();
        return view('services',[
            'socials' => $socials,
            'service' => $service, 
        ]);
    }

    // public function coming() {
        
    //     return view('coming');
    // }

    public function viewProject($slug){
        $project = Project::with('images')->where('slug', $slug)->firstOrFail();
        return view('viewProject', [
            'project' => $project,
        ]);
    }

    public function post() {
        $posts = BlogPost::all();
        $recentPosts = BlogPost::orderBy('created_at', 'desc')->limit(5)->get();
        return view('post',[
            'posts' => $posts,
            'recentPosts' => $recentPosts
        ]);
    }

    public function viewPost($slug) {
        $post = BlogPost::where('slug', $slug)->firstOrFail();
        $recentPosts = BlogPost::orderBy('created_at', 'desc')->take(5)->get();
        return view('viewPost',[
            'post' => $post,
            'recentPosts' => $recentPosts
        ]);
    }

}
