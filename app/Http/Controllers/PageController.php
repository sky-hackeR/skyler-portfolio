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


use SweetAlert;
use Alert;
use Log;
use Carbon\Carbon;;

class PageController extends Controller
{
    //

    public function welcome() {
        $counter = Counter::all();
        $socials = Social::all();
        return view('welcome',[
            'counter' => $counter,
            'socials' => $socials
        ]);
    }

    public function about() {
        $about= About::get();
        $socials = Social::all();
        $experience = Experience::all();
        $education = Education::all();
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
        
        return view('credentials');
    }

    public function project() {
        
        return view('project');
    }

    public function services() {
        
        return view('services');
    }

    public function coming() {
        
        return view('coming');
    }
}
