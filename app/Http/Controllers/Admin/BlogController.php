<?php

namespace App\Http\Controllers\Admin;

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
use Carbon\Carbon;

class BlogController extends Controller
{
    //

    public function post(){
        $post = BlogPost::get();
        return view('admin.post', [
            'post' => $post
        ]);
    }

    public function allPosts(){
        $posts = BlogPost::all();
        return view('admin.allPosts', [
            'posts' => $posts
        ]);
    }
}
