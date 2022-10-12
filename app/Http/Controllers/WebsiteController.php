<?php

namespace App\Http\Controllers;

use App\Faq;
use App\News;
use App\Usefullinks;
use App\Questionpaper;
use App\Gen;
use App\Blog;
use App\Term;
use App\Tutor;
use Exception;
use App\Slider;
use App\Contact;
use App\Questionpaperdownload;
use App\Gallery;
use App\GlyCatg;
use App\PdtCatg;
use App\PjxCatg;
use App\Product;
use App\Project;
use App\SerCatg;
use App\Service;
use App\Testimonial;
use App\Privacypolicy;
use \App\Mail\SendMail;
use App\HomePageContent;
use App\Resource;
use App\Result;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    private $GeneralSettings;

    public function __construct()
    {
        $gens = Gen::find(1);
        $this->GeneralSettings = $gens;

    }

    public function home() {
        $products = Product::with('categories')->where('status', '=', 1)->orderBy('disp_order')->get();
        $products_catg = PdtCatg::has('product')->where('status', '=', 1)->orderBy('disp_order')->get();
        $services = Service::with('categories')->where('status', '=', 1)->orderBy('disp_order')->get();
        $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(3)->get();
        $sliders = Slider::where('status', '=', 1)->orderBy('disp_order')->get();
        $testimonials = Testimonial::where('status', '=', 1)->orderBy('disp_order')->get();
        $news=News::where('status', 1)->orderBy('disp_order')->get();
        $faqs=Faq::where('status', 1)->orderBy('disp_order')->get();
        $features= Service::where('catg_id',1)->where('status', '=', 1)->orderBy('disp_order')->get();
        $homepage = HomePageContent::findOrFail(1);
        $reviews = Project::with('categories')->where('status',1)->get();
        $usefullinks=Usefullinks::where('status', 1)->orderBy('disp_order')->get();
        $questionpapers=Questionpaper::where('status', 1)->orderBy('disp_order')->get();
        $results=Result::where('status', 1)->orderBy('disp_order')->get();
        return view('website.home',compact('faqs','features','homepage','products','reviews','sliders','news','usefullinks','questionpapers','results'));
    }

    public function about() {
     
        $homepage = HomePageContent::findOrFail(1);
        $features= Service::where('catg_id',5)->where('status', '=', 1)->orderBy('disp_order')->get();

        return view('website.about',compact('homepage','features'));
    }

    public function results() {
     
        $homepage = HomePageContent::findOrFail(1);
        $features= Service::where('catg_id',5)->where('status', '=', 1)->orderBy('disp_order')->get();
        $results=Result::where('status', 1)->orderBy('disp_order')->get();
        return view('website.results',compact('homepage','features','results'));
    }

    public function services() {
        $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(1)->get();
        $services = Service::with('categories')->where('status', '=', 1)->orderBy('disp_order')->get();
        $services_catg = SerCatg::has('service')->where('status', '=', 1)->orderBy('disp_order')->get();

        return view('website.services')->with([
            "gens" => $this->GeneralSettings,
            "blogs" => $blogs,
            "services" => $services,
            "services_catg" => $services_catg
        ]);
    }

    public function projects() {
        $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(1)->get();
        $projects = Project::with('categories')->where('status', '=', 1)->orderBy('disp_order')->get();
        $projects_catg = PjxCatg::has('project')->where('status', '=', 1)->orderBy('disp_order')->get();

        return view('website.projects')->with([
            "gens" => $this->GeneralSettings,
            "blogs" => $blogs,
            "projects" => $projects,
            "projects_catg" => $projects_catg
        ]);
    }

    public function products() {
        $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(1)->get();
        $products = Product::with('categories')->where('status', '=', 1)->orderBy('disp_order')->get();
        $products_catg = PdtCatg::has('product')->where('status', '=', 1)->orderBy('disp_order')->get();

        return view('website.products')->with([
            "gens" => $this->GeneralSettings,
            "blogs" => $blogs,
            "products" => $products,
            "products_catg" => $products_catg
        ]);
    }

    public function blogs() {
        $blogs = Blog::with('categories')->where('status', '=', 1)->orderBy('disp_order')->take(4)->get();
        $allblogs = Blog::with('categories')->where('status', '=', 1)->latest()->get();
        return view('website.blogs',compact('blogs'));
       
    }    

    public function gallery() {
        $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(1)->get();
        $gallerys = Gallery::with('categories')->where('status', '=', 1)->latest()->get();
        $gallerys_catg = GlyCatg::has('gallery')->where('status', '=', 1)->get();
        
        return view('website.gallery')->with([
            "gens" => $this->GeneralSettings,
            "blogs" => $blogs,
            "gallerys" => $gallerys,
            "gallerys_catg" => $gallerys_catg
        ]);
    }    
    
    public function contactus() {
        $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(1)->get();

        return view('website.contact-us')->with([
            "gens" => $this->GeneralSettings,
            "blogs" => $blogs 
        ]);
    }    

    public function thankyou() {
        $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(1)->get();

        return view('Emails.thanks')->with([
            "gens" => $this->GeneralSettings,
            "blogs" => $blogs 
        ]);
    }

    public function privacypolicy() {
        $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(1)->get();
        $privacy = Privacypolicy::find(1);
        return view('website.privacy-policy')->with([
            "gens" => $this->GeneralSettings,
            "blogs" => $blogs,
            "privacy" => $privacy
        ]);         
    }

    public function termsandconditions() {
        $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(1)->get();
        $term = Term::find(1);
        return view('website.terms')->with([
            "gens" => $this->GeneralSettings,
            "blogs" => $blogs,
            "term" => $term
        ]);         
    }

    public function careers() {
        $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(1)->get();

        return view('website.careers')->with([
            "gens" => $this->GeneralSettings,
            "blogs" => $blogs 
        ]);        
    }

    public function savecontact(Request $request)
    {


        try {
            
            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            $contact->remarks = '';
            
            $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(1)->get();

            if($contact->save()) {

                $message  = "<p>Name: " . $contact->name ."</p>";
                $message .= "<p>Email: " . $contact->email ."</p>";
                $message .= "<p>Phone: " . $contact->phone ."</p>";
                $message .= "<p>Message: " . $contact->message ."</p>";

                try {
                    $details =[
                        'from' => 'webmail@reontel.com',
                        'from_name' => 'Reon Technologies',
                        'subject' => 'Website Contact',
                        'template' => 'Emails.template1',
                        'title' => 'Website Contact',
                        'body' =>  $message
                    ];
                    
                    Mail::to('reontel@gmail.com')->cc("jayant.jose@reontel.com")->send(new SendMail($details));
        
                    return redirect()->route('thankyou')->with([
                        "gens" => $this->GeneralSettings,
                        "blogs" => $blogs,
                    ]);
                }
                catch (Exception $ex) {
                    $request->session()->flash("Error","There was an error in sending the email");

                    return redirect()->route('contactus')->with([
                        "gens" => $this->GeneralSettings,
                        "blogs" => $blogs,
                    ]);
                }                

            }
            else {
                $request->session()->flash("Error","There was an error in sending the email");

                return redirect()->route('contactus')->with([
                    "gens" => $this->GeneralSettings,
                    "blogs" => $blogs,
                ]);
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

        return redirect()->route('contactus')->with([
            "gens" => $this->GeneralSettings,
            "blogs" => $blogs,
        ]);

    }    
    public function saveQuestionpaperDownloads(Request $request)
    {


        try {
            
            $downloads = new Questionpaperdownload;
            $downloads->q_id = $request->q_id;
            $downloads->qd_name = $request->qd_name;
            $downloads->qd_email = $request->qd_email;
            $downloads->qd_phone = $request->qd_phone;
            $downloads->message = $request->message;
            if($downloads->save()) {
                return "Success";
               
            }
            else{
                return "Failed";
            }
            
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

        

    }    
    public function SaveContacts(Request $request)
    {
         //return response()->json($request->all());
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        //$contact->message = $request->message;
        $contact->course = $request->course;
        //$contact->remarks = '';

        if($contact->save()) {
            $message = "<p class='title'>Name: <b>" . $contact->name ."</b></p>";
            $message .= "<p class='title'>Email: <b>" . $contact->email ."</b></p>";
            $message .= "<p class='title'>Phone: <b>" . $contact->phone ."</b></p>";
            $message .= "<p class='title'>Course: <b>" . $contact->course ."</b></p>";
           // $message .= "<p class='title'>Message: <b>" . $contact->message ."</b></p>";

            try {
                $details =[
                        'from' => 'webmail@reontel.com',
                        'from_name' => 'Reon Technologies',
                        'subject' => 'Website Contact',
                        'template' => 'Emails.template1',
                        'title' => 'Website Contact',
                        'body' =>  $message
                    // 'from' => 'webmail@reontel.com',
                    // 'subject' => 'Website Contact',
                    // 'template' => 'Emails.template1',
                    // 'title' => 'Contact from Website ',
                    // 'body' =>  $message
                ];
             Mail::to('sreebhasree@gmail.com')->send(new SendMail($details));
                return "Success";
            }
            catch (Exception $ex) {
                //dd($ex);
                return "Failed";
            }  
        }

    }
    public function showblog(Request $request, $slug)
    {
        try{
            $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(10)->get();
            $blog = Blog::where('url_slug',$slug)->first();
            $recentblogs = Blog::with('categories')->where('status', '=', 1)->orderBy('disp_order')->get();

            return view('website.single-blog')->with([
                "blogs" => $blogs,
                "thisblog" => $blog,
                "recentblogs" => $recentblogs
            ]);
        }
        catch(Exception $ex) {
            return abort(404);
        }
    }

    public function showproject(Request $request, $slug)
    {
        try {
            $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(1)->get();
            $project = Project::where('url_slug',$slug)->first();
            $recentprojects = Project::with('categories')->where('status', '=', 1)->orderBy('disp_order')->get();
            $genimages = Storage::disk('projects')->files($project->id);

            return view('website.single-project')->with([
                "gens" => $this->GeneralSettings,
                "blogs" => $blogs,
                "thisproject" => $project,
                "recentprojects" => $recentprojects,
                "genimages" => $genimages
            ]);
        }
        catch(Exception $ex) {
            return abort(404);
        }
    }

    public function showproduct(Request $request, $slug)
    {
        try {
            $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(1)->get();
            $product = Product::where('url_slug',$slug)->first();
            $recentproducts = Product::with('categories')->where('status', '=', 1)->orderBy('disp_order')->get();
            $genimages = Storage::disk('products')->files($product->id);

            return view('website.single-product')->with([
                "gens" => $this->GeneralSettings,
                "blogs" => $blogs,
                "thisproduct" => $product,
                "recentproducts" => $recentproducts,
                "genimages" => $genimages
            ]);
        }
        catch(Exception $ex) {
            return abort(404);
        }
    }

    public function showservice(Request $request, $slug)
    {
        try{    
            $blogs = Blog::with('categories')->where('status', '=', 1)->latest()->take(1)->get();
            $service = Service::where('url_slug',$slug)->first();
            $recentservices = Service::with('categories')->where('status', '=', 1)->orderBy('disp_order')->get();
            $genimages = Storage::disk('services')->files($service->id);

            return view('website.single-service')->with([
                "gens" => $this->GeneralSettings,
                "blogs" => $blogs,
                "thisservice" => $service,
                "recentservices" => $recentservices,
                "genimages" => $genimages
            ]);
        }
        catch(Exception $ex) {
            return abort(404);
        }
    }
   

    public function howitworks(Request $request){
        $features= Service::where('catg_id',2)->where('status', '=', 1)->orderBy('disp_order')->latest()->take(3)->get();
        return view('website.howitworks',compact('features'));
    }


    public function corporate(Request $request){
        $features= Service::where('catg_id',3)->where('status', '=', 1)->orderBy('disp_order')->latest()->take(3)->get();
        $homepage = HomePageContent::findOrFail(1);
        return view('website.corporates',compact('features','homepage'));
    }

    public function becomeatutor(Request $request){
        $features= Service::where('catg_id',4)->where('status', '=', 1)->orderBy('disp_order')->latest()->take(3)->get();
        $reviews = Project::with('categories')->where('status',1)->get();
        return view('website.become-a-tutor',compact('features','reviews'));
    }
    public function faqs(Request $request){
        return view('website.faq');
    }
    public function courses(Product $course){
        return view('website.course',compact('course'));
    }
    public function resources(Request $request){
        $courses=Product::where('status',1)->orderBy('disp_order')->get();
        if($request->course_id){
            $resources=Resource::where(['status'=>1,'course_id'=>$request->course_id])->get();
            $selectedcourse=$request->course_id;
            return view('website.resource',compact('courses','resources','selectedcourse'));
        
        }
        else{
            $resources=Resource::where('status',1)->latest()->take(5)->get();
        }
        return view('website.resource',compact('courses','resources'));
    }

}
