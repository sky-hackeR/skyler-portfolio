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


    public function addPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));

        if ($request->hasFile('image')) {
            $imagePath = cloudinary()->uploadFile($request->file('image')->getRealPath())->getSecurePath();
        }

        $newBlogPost = [
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'image' => $imagePath,
        ];

        if (BlogPost::create($newBlogPost)) {
            alert()->success('Changes Saved', 'Blog post added successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function deletePost(Request $request) {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if (!$blogPost = Project::find($request->post_id)) {
            alert()->error('Oops', 'Invalid Project')->persistent('Close');
            return redirect()->back();
        }

        if ($blogPost->delete()) {
            alert()->success('Changes Saved', 'Blog post deleted successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function editPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required',
        ]);
    
        if ($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }
    
        if (!$blogPost = BlogPost::find($request->post_id)) {
            alert()->error('Oops', 'Invalid Blog Post Information')->persistent('Close');
            return redirect()->back();
        }
    
        if (!empty($request->title) && $request->title != $blogPost->title) {
            $blogPost->title = $request->title;
        }
    
        $blogPost->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));

        if (!empty($request->content) && $request->content != $blogPost->content) {
            $blogPost->content = $request->content;
        }
    
        if ($request->hasFile('image')) {
            $imagePath = cloudinary()->uploadFile($request->file('image')->getRealPath())->getSecurePath();
            $blogPost->image = $imagePath;
        }
    
        if ($blogPost->save()) {
            alert()->success('Changes Saved', 'Blog post updated successfully')->persistent('Close');
            return redirect()->back();
        }
    
        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }
    

}
