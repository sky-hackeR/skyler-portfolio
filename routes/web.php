<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', [App\Http\Controllers\PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');
Route::get('/credentials', [App\Http\Controllers\PageController::class, 'credentials'])->name('credentials');
Route::get('/project', [App\Http\Controllers\PageController::class, 'project'])->name('project');
Route::get('/services', [App\Http\Controllers\PageController::class, 'services'])->name('services');
Route::get('/coming', [App\Http\Controllers\PageController::class, 'coming'])->name('coming');
Route::get('/viewProject/{slug}', [App\Http\Controllers\PageController::class, 'viewProject'])->name('viewProject');
Route::get('/post', [App\Http\Controllers\PageController::class, 'post'])->name('post');
Route::get('/search', [App\Http\Controllers\PageController::class, 'search'])->name('post');
Route::get('/viewPost/{slug}', [App\Http\Controllers\PageController::class, 'viewPost'])->name('viewPost');



Route::group(['prefix' => 'admin'], function () {
  Route::get('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
  Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
  Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
  Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

  // Route::get('/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
  // Route::post('/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register']);

  Route::post('/password/email', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.request');
  Route::post('/password/reset', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'reset'])->name('password.email');
  Route::get('/password/reset', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
  Route::get('/password/reset/{token}', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'showResetForm']);

  Route::post('/updateSiteInfo', [App\Http\Controllers\Admin\AdminController::class, 'updateSiteInfo'])->name('updateSiteInfo')->middleware(['auth:admin']);


  Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('home')->middleware(['auth:admin']);
  Route::get('/siteSettings', [App\Http\Controllers\Admin\AdminController::class, 'siteSettings'])->name('siteSettings')->middleware(['auth:admin']);

  Route::get('/socials', [App\Http\Controllers\Admin\AdminController::class, 'socials'])->name('socials')->middleware(['auth:admin']);
  Route::post('/addSocial', [App\Http\Controllers\Admin\AdminController::class, 'addSocial'])->name('addSocial')->middleware(['auth:admin']);
  Route::post('/editSocial', [App\Http\Controllers\Admin\AdminController::class, 'editSocial'])->name('editSocial')->middleware(['auth:admin']);
  Route::post('/deleteSocial', [App\Http\Controllers\Admin\AdminController::class, 'deleteSocial'])->name('deleteSocial')->middleware(['auth:admin']);

  Route::get('/skills', [App\Http\Controllers\Admin\AdminController::class, 'skills'])->name('skills')->middleware(['auth:admin']);
  Route::post('/addSkill', [App\Http\Controllers\Admin\AdminController::class, 'addSkill'])->name('addSkill')->middleware(['auth:admin']);
  Route::post('/editSkill', [App\Http\Controllers\Admin\AdminController::class, 'editSkill'])->name('editSkill')->middleware(['auth:admin']);
  Route::post('/deleteSkill', [App\Http\Controllers\Admin\AdminController::class, 'deleteSkill'])->name('deleteSkill')->middleware(['auth:admin']);

  Route::get('/projects', [App\Http\Controllers\Admin\AdminController::class, 'projects'])->name('projects')->middleware(['auth:admin']);
  Route::get('/allProjects', [App\Http\Controllers\Admin\AdminController::class, 'allProjects'])->name('allProjects')->middleware(['auth:admin']);
  Route::post('/addProject', [App\Http\Controllers\Admin\AdminController::class, 'addProject'])->name('addProject')->middleware(['auth:admin']);
  Route::post('/editProject', [App\Http\Controllers\Admin\AdminController::class, 'editProject'])->name('editProject')->middleware(['auth:admin']);
  Route::post('/deleteProject', [App\Http\Controllers\Admin\AdminController::class, 'deleteProject'])->name('deleteProject')->middleware(['auth:admin']);

  Route::get('/projectImage', [App\Http\Controllers\Admin\AdminController::class, 'projectImage'])->name('projectImage')->middleware(['auth:admin']);
  Route::post('/addProjectImage', [App\Http\Controllers\Admin\AdminController::class, 'addProjectImage'])->name('addProjectImage')->middleware(['auth:admin']);
  Route::post('/deleteProjectImage', [App\Http\Controllers\Admin\AdminController::class, 'deleteProjectImage'])->name('deleteProjectImage')->middleware(['auth:admin']);

  Route::get('/contacts', [App\Http\Controllers\Admin\AdminController::class, 'contacts'])->name('contacts')->middleware(['auth:admin']);
  Route::post('/addContactInfo', [App\Http\Controllers\Admin\AdminController::class, 'addContactInfo'])->name('addContactInfo')->middleware(['auth:admin']);
  Route::post('/editContactInfo', [App\Http\Controllers\Admin\AdminController::class, 'editContactInfo'])->name('editContactInfo')->middleware(['auth:admin']);
  Route::post('/deleteContactInfo', [App\Http\Controllers\Admin\AdminController::class, 'deleteContactInfo'])->name('deleteContactInfo')->middleware(['auth:admin']);

  Route::get('/education', [App\Http\Controllers\Admin\AdminController::class, 'education'])->name('education')->middleware(['auth:admin']);
  Route::post('/addEducation', [App\Http\Controllers\Admin\AdminController::class, 'addEducation'])->name('addEducation')->middleware(['auth:admin']);
  Route::post('/editEducation', [App\Http\Controllers\Admin\AdminController::class, 'editEducation'])->name('editEducation')->middleware(['auth:admin']);
  Route::post('/deleteEducation', [App\Http\Controllers\Admin\AdminController::class, 'deleteEducation'])->name('deleteEducation')->middleware(['auth:admin']);

  Route::get('/experiences', [App\Http\Controllers\Admin\AdminController::class, 'experiences'])->name('experiences')->middleware(['auth:admin']);
  Route::post('/addExperience', [App\Http\Controllers\Admin\AdminController::class, 'addExperience'])->name('addExperience')->middleware(['auth:admin']);
  Route::post('/editExperience', [App\Http\Controllers\Admin\AdminController::class, 'editExperience'])->name('editExperience')->middleware(['auth:admin']);
  Route::post('/deleteExperience', [App\Http\Controllers\Admin\AdminController::class, 'deleteExperience'])->name('deleteExperience')->middleware(['auth:admin']);

  Route::get('/about', [App\Http\Controllers\Admin\AdminController::class, 'about'])->name('about')->middleware(['auth:admin']);
  Route::post('/updateAbout', [App\Http\Controllers\Admin\AdminController::class, 'updateAbout'])->name('updateAbout')->middleware(['auth:admin']);

  Route::get('/counter', [App\Http\Controllers\Admin\AdminController::class, 'counter'])->name('counter')->middleware(['auth:admin']);
  Route::post('/updateCounter', [App\Http\Controllers\Admin\AdminController::class, 'updateCounter'])->name('updateCounter')->middleware(['auth:admin']);

  Route::get('/service', [App\Http\Controllers\Admin\AdminController::class, 'service'])->name('service')->middleware(['auth:admin']);
  Route::post('/addService', [App\Http\Controllers\Admin\AdminController::class, 'addService'])->name('addService')->middleware(['auth:admin']);
  Route::post('/editService', [App\Http\Controllers\Admin\AdminController::class, 'editService'])->name('editService')->middleware(['auth:admin']);
  Route::post('/deleteService', [App\Http\Controllers\Admin\AdminController::class, 'deleteService'])->name('deleteService')->middleware(['auth:admin']);

  Route::get('/certificate', [App\Http\Controllers\Admin\AdminController::class, 'certificate'])->name('certificate')->middleware(['auth:admin']);
  Route::post('/addCertificate', [App\Http\Controllers\Admin\AdminController::class, 'addCertificate'])->name('addCertificate')->middleware(['auth:admin']);
  Route::post('/editCertificate', [App\Http\Controllers\Admin\AdminController::class, 'editCertificate'])->name('editCertificate')->middleware(['auth:admin']);
  Route::post('/deleteCertificate', [App\Http\Controllers\Admin\AdminController::class, 'deleteCertificate'])->name('deleteCertificate')->middleware(['auth:admin']);


  Route::get('/post', [App\Http\Controllers\Admin\BlogController::class, 'post'])->name('post')->middleware(['auth:admin']);
  Route::get('/allPosts', [App\Http\Controllers\Admin\BlogController::class, 'allPosts'])->name('allPosts')->middleware(['auth:admin']);
  Route::post('/addPost', [App\Http\Controllers\Admin\BlogController::class, 'addPost'])->name('addPost')->middleware(['auth:admin']);
  Route::post('/editPost', [App\Http\Controllers\Admin\BlogController::class, 'editPost'])->name('editPost')->middleware(['auth:admin']);
  Route::post('/deletePost', [App\Http\Controllers\Admin\BlogController::class, 'deletePost'])->name('deletePost')->middleware(['auth:admin']);
  
});