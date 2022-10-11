<?php

use Illuminate\Support\Facades\Auth;
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

// Routes for website navigation
Route::get('/', 'WebsiteController@home')->name('home');
Route::get('/home', 'WebsiteController@home')->name('homepage');
Route::get('/about', 'WebsiteController@about')->name('about');
Route::get('/services', 'WebsiteController@services')->name('services');
Route::get('/projects', 'WebsiteController@projects')->name('projects');
Route::get('/products', 'WebsiteController@products')->name('products');
Route::get('/gallery', 'WebsiteController@gallery')->name('gallery');
Route::get('/results', 'WebsiteController@results')->name('results');
Route::get('/contact-us', 'WebsiteController@contactus')->name('contactus');
Route::post('/save-contact', 'WebsiteController@savecontact')->name('savecontact');
Route::post('/save-contacts', 'WebsiteController@SaveContacts')->name('SaveContacts');
Route::post('/save-questionpaper', 'WebsiteController@saveQuestionpaperDownloads')->name('saveQuestionpaperDownloads');
Route::get('/thank-you', 'WebsiteController@thankyou')->name('thankyou');
Route::get('/privacy-policy', 'WebsiteController@privacypolicy')->name('privacypolicy');
Route::get('/terms-and-conditons', 'WebsiteController@termsandconditions')->name('terms');
Route::get('/careers', 'WebsiteController@careers')->name('careers');


#BIBIN
Route::get('/how-it-works', 'WebsiteController@howitworks')->name('howitworks');
Route::get('/for-corporates', 'WebsiteController@corporate')->name('corporate');
Route::get('/become-a-tutor', 'WebsiteController@becomeatutor')->name('becomeatutor');
Route::get('/faq', 'WebsiteController@faqs')->name('faq');
Route::get('/blogs', 'WebsiteController@blogs')->name('blogs');
Route::get('/course/{course:url_slug?}', 'WebsiteController@courses')->name('course');
Route::any('/resource', 'WebsiteController@resources')->name('resource');


Route::get('/blog/{slug}', 'WebsiteController@showblog')->name('showblog');
Route::get('/project/{slug}', 'WebsiteController@showproject')->name('showproject');
Route::get('/services/{slug}', 'WebsiteController@showservice')->name('showservice');
Route::get('/product/{slug}', 'WebsiteController@showproduct')->name('showproduct');

// End Routes for website navigation


// Routes for website admin navigation
Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users','UsersController',['except'=>['show']]);
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::resource('/pdtcategories','PdtCatgsController',['except'=>['show']]);
    Route::resource('/pdtsubcategories','PdtSubCatgsController',['except'=>['show']]);
    Route::resource('/products','ProductsController',['except'=>['show']]);
    Route::resource('/sercategories','SerCatgsController',['except'=>['show']]);
    Route::resource('/sersubcategories','SerSubCatgsController',['except'=>['show']]);
    Route::resource('/services','ServicesController',['except'=>['show']]);
    Route::resource('/pjxcategories','PjxCatgsController',['except'=>['show']]);
    Route::resource('/projects','ProjectsController',['except'=>['show']]);
    Route::resource('/blgcategories','BlgCatgsController',['except'=>['show']]);
    Route::resource('/blogs','BlogsController',['except'=>['show']]);
    Route::resource('/glycategories','GlyCatgsController',['except'=>['show']]);
    Route::resource('/gallerys','GallerysController',['except'=>['show']]);
    Route::resource('/general','GensController',['except'=>['show']]);
    Route::resource('/privacypolicy','PrivacypolicyController',['except'=>['show']]);
    Route::resource('/terms','TermsController',['except'=>['show']]);
    Route::resource('/sliders','SlidersController',['except'=>['show']]);
    Route::resource('/testimonials','TestimonialsController',['except'=>['show']]);
    Route::resource('/faqs','FaqsController',['except'=>['show']]);
    Route::resource('/news','NewsController',['except'=>['show']]);
    Route::resource('/usefullinks','UsefullinksController',['except'=>['show']]);
    Route::resource('/contacts','ContactsController',['except'=>['show']]);
    Route::resource('/questionpapers','QuestionpaperController',['except'=>['show']]);
    Route::resource('/results','ResultController',['except'=>['show']]);

    #AJU
    Route::resource('/topics','TopicController',['except'=>['show']]);
    Route::get('/home-page-content/{id?}','HomePageContentController@edit')->name('homePageContent');
    Route::put('/home-page-content/{id?}','HomePageContentController@update')->name('homePageContent.update');
    Route::resource('/tutors','TutorController',['except'=>['show']]);
    #BIBIN
    Route::resource('/resources','ResourceController',['except'=>['show']]);
    Route::resource('/feedbacks','FeedbackController',['except'=>['show']]);

    Route::get('/questionpapers-users','QuestionpaperController@questionPapersUsers')->name('questionPapersUsers');

    Route::get('/changepassword','UsersController@changepass')->name('changepassword');
    Route::put('/savepassword','UsersController@savepass')->name('savepassword');
    
    //Status Updation - doing as ajax
    Route::post('pdtcatg/status','PdtCatgsController@status_change')->name('pdtcatg_status_change');
    Route::post('pdtsubcatg/status','PdtSubCatgsController@status_change')->name('pdtsubcatg_status_change');
    Route::post('products/status','ProductsController@status_change')->name('products_status_change');
    Route::post('sercatg/status','SerCatgsController@status_change')->name('sercatg_status_change');
    Route::post('sersubcatg/status','SerSubCatgsController@status_change')->name('sersubcatg_status_change');
    Route::post('service/status','ServicesController@status_change')->name('service_status_change');
    Route::post('pjxcatg/status','PjxCatgsController@status_change')->name('pjxcatg_status_change');
    Route::post('projects/status','ProjectsController@status_change')->name('projects_status_change');
    Route::post('blgcatg/status','BlgCatgsController@status_change')->name('blgcatg_status_change');
    Route::post('blog/status','BlogsController@status_change')->name('blog_status_change');
    Route::post('galcatg/status','GlyCatgsController@status_change')->name('galcatg_status_change');
    Route::post('gallery/status','GallerysController@status_change')->name('gallery_status_change');
    Route::post('slider/status','SlidersController@status_change')->name('slider_status_change');
    Route::post('testimonial/status','TestimonialsController@status_change')->name('testimonial_status_change');
    Route::post('faq/status','FaqsController@status_change')->name('faq_status_change');
    Route::post('news/status','NewsController@status_change')->name('news_status_change');
    Route::post('usefullinks/status','UsefullinksController@status_change')->name('usefullinks_status_change');
    Route::post('questionpapers/status','QuestionpaperController@status_change')->name('questionpaper_status_change');
    Route::post('results/status','ResultController@status_change')->name('results_status_change');
    Route::post('contacts/status','ContactsController@status_change')->name('contacts_status_change');
    Route::post('users/status','UsersController@status_change')->name('users_status_change');


    #AJU
    Route::post('topics/status','TopicController@status_change')->name('topic_status_change');
    Route::post('tutors/status','TutorController@status_change')->name('tutor_status_change');
    Route::post('resources/status','ResourceController@status_change')->name('resource_status_change');



});
// End Routes for website admin navigation

//Ajax Data
Route::post('getproductssubcategories','Admin\AjaxDataController@GetProductsSubCategories')->name('productsubcategories.fetch');
Route::post('getservicesubcategories','Admin\AjaxDataController@GetServicesSubCategories')->name('servicesubcategories.fetch');
Route::post('savecontact','Admin\AjaxDataController@SaveContact')->name('ajaxsavecontact');
Route::post('removeimagefile','Admin\AjaxDataController@RemoveFile')->name('removeimagefile');
