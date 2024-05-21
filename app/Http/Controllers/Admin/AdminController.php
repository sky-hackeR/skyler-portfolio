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
use App\Models\Skill;

use SweetAlert;
use Alert;
use Log;
use Carbon\Carbon;

class AdminController extends Controller
{
    //

    public function index(){
        $setting = Setting::first();
        if(empty($setting->favicon) || empty($setting->site_name) || empty($setting->logo_bottom) || empty($setting->logo_top)){
            return view('admin.siteSettings', [
                'setting' => $setting
            ]);
        }

        return view('admin.home');
    }

    public function siteSettings(){
        $setting = Setting::first();
        return view('admin.siteSettings', [
            'setting' => $setting,
        ]);
    }

    public function socials(){
        $socials = Social::get();
        return view('admin.socials', [
            'socials' => $socials
        ]);
    }

    public function skills(){
        $skills = Skill::get();
        return view('admin.skills', [
            'skills' => $skills
        ]);
    }

    public function projects(){
        $projects = Project::get();
        return view('admin.projects', [
            'projects' => $projects
        ]);
    }

    public function contacts(){
        $contacts = ContactInfo::get();
        return view('admin.contacts', [
            'contacts' => $contacts
        ]);
    }

    public function experiences(){
        $experiences = Experience::get();
        return view('admin.experiences', [
            'experiences' => $experiences
        ]);
    }

    public function about(){
        $about = About::first();
        return view('admin.about', [
            'about' => $about
        ]);
    }

    public function education(){
        $education = Education::get();
        return view('admin.education', [
            'education' => $education
        ]);
    }

    public function updateAbout(Request $request){
        $validator = Validator::make($request->all(), [
            'about' => 'required',
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error('Error', $validator->messages()->first())->persistent('Close');
            return redirect()->back();
        }

        // Find the existing about record or create a new one
        $about = About::first();

        if (!$about) {
            $about = new About();
        }

        // Update the about statement
        $about->about = $request->about;
        $about->title = $request->title;

        if ($about->save()) {
            alert()->success('Changes Saved', 'About Us updated successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function updateSiteInfo(Request $request){
        $validator = Validator::make($request->all(), [
            'logo_bottom' => 'nullable|image',
            'logo_top' => 'nullable|image',
            'favicon' => 'nullable|image',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        $siteInfo = new Setting;
        if(!empty($request->site_info_id) && !$siteInfo = Setting::find($request->site_info_id)){
            alert()->error('Oops', 'Invalid Site Information')->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->site_name)){
            $sitename = $request->site_name;
            $siteInfo->site_name = $sitename;
        }

        if(!empty($request->description)){
            $description = $request->description;
            $siteInfo->description = $description;
        }
        
        if(!empty($request->logo_bottom)){
            $logoBottom  = cloudinary()->uploadFile($request->file('logo_bottom')->getRealPath())->getSecurePath();

            $siteInfo->logo_bottom = $logoBottom;
        }
       
        if(!empty($request->logo_top)){
            $logoTop  = cloudinary()->uploadFile($request->file('logo_top')->getRealPath())->getSecurePath();

            $siteInfo->logo_top = $logoTop;
        }

        if(!empty($request->favicon)){
            $favicon  = cloudinary()->uploadFile($request->file('favicon')->getRealPath())->getSecurePath();

            $siteInfo->favicon = $favicon;
        }

        if($siteInfo->save()){
            alert()->success('Changes Saved', 'Site information changes saved successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function addSocial(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'link' => 'required',
            'icon' => 'required',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        $newSocial = ([
            'name' => $request->name,
            'link' => $request->link,
            'icon' => $request->icon,
        ]);

        if(Social::create($newSocial)){
            alert()->success('Changes Saved', 'Social link added successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function deleteSocial(Request $request){
        $validator = Validator::make($request->all(), [
            'social_id' => 'required',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$social = Social::find($request->social_id)){
            alert()->error('Oops', 'Invalid Social Link')->persistent('Close');
            return redirect()->back();
        }

        if($social->delete()){
            alert()->success('Changes Saved', 'Social link deleted successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function editSocial(Request $request){
        $validator = Validator::make($request->all(), [
            'social_id' => 'required',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$social = Social::find($request->social_id)){
            alert()->error('Oops', 'Invalid Social Link')->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->name) && $request->name != $social->name){
            $social->name = $request->name;
        }

        if(!empty($request->link) && $request->link != $social->link){
            $social->link = $request->link;
        }

        if(!empty($request->icon) && $request->icon!= $social->icon){
            $social->icon = $request->icon;
        }

        if($social->save()){
            alert()->success('Changes Saved', 'Social link changes saved successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function addContactInfo(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        $newContactInfo = ([
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        if(ContactInfo::create($newContactInfo)){
            alert()->success('Changes Saved', 'Contact information added successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function deleteContactInfo(Request $request){
        $validator = Validator::make($request->all(), [
            'contact_id' => 'required',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$contact = ContactInfo::find($request->contact_id)){
            alert()->error('Oops', 'Invalid Contact Information')->persistent('Close');
            return redirect()->back();
        }

        if($contact->delete()){
            alert()->success('Changes Saved', 'Contact information deleted successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function editContactInfo(Request $request){
        $validator = Validator::make($request->all(), [
            'contact_id' => 'required',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$contact = ContactInfo::find($request->contact_id)){
            alert()->error('Oops', 'Invalid Social Link')->persistent('Close');
            return redirect()->back();
        }

        if(!empty($request->email) && $request->email != $contact->email){
            $contact->email = $request->email;
        }

        if(!empty($request->phone_number) && $request->phone_number != $contact->phone_number){
            $contact->phone_number = $request->phone_number;
        }

        if(!empty($request->address) && $request->address!= $contact->address){
            $contact->address = $request->address;
        }

        if($contact->save()){
            alert()->success('Changes Saved', 'Contact information changes saved successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }


}
