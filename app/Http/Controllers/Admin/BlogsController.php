<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\BlgCatg;
use App\Blog;
use Exception;
use Gate;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('categories')->get();
        return view('admin.blogs.index')->with([
            'blogs' => $blogs,
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.blogs.index'));
        }
        $maincategory = BlgCatg::all();
       
        return view('admin.blogs.new')->with([
            'maincategory' => $maincategory,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.blogs.index'));
        }

        request()->validate([
            'catg_id' => ['required', 'string'],
            'blog_title' => ['required', 'string', 'max:255', 'unique:blogs'],
            'url_slug' => ['required', 'string', 'max:255', 'unique:blogs','alpha_dash'],
            'thump_image.*' => ['mimes:jpeg,jpg|max:2048'],
            'image1.*' => ['mimes:jpeg,jpg|max:2048'],
            'image2.*' => ['mimes:jpeg,jpg|max:2048'],
            'image3.*' => ['mimes:jpeg,jpg|max:2048'],
            'image4.*' => ['mimes:jpeg,jpg|max:2048'],
            'image5.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $blog = new Blog;
            $blog->catg_id = $request->catg_id;
            $blog->blog_title  = $request->blog_title ;
            $blog->blog_date = $request->blog_date;
            $blog->short_description = $request->short_description;
            $blog->blog_content = $request->blog_content;
            $blog->keywords = $request->keywords;
            $blog->metatags = $request->metatags;
            $blog->url_slug = $request->url_slug;
            $blog->disp_order = $request->disp_order;
            $blog->thump_image = '';
            $blog->thump_alt = '';
            $blog->image1 = '';
            $blog->image1_alt = '';
            $blog->image2 = '';
            $blog->image2_alt = '';
            $blog->image3 = '';
            $blog->image3_alt = '';
            $blog->image4 = '';
            $blog->image4_alt = '';
            $blog->image5 = '';
            $blog->image5_alt = '';

            if($blog->save()) {
                if(request()->thump_image) {
                    //$fileName = "blog_".$blog->id .'_t.'.request()->thump_image->getClientOriginalExtension();
                    $fileName = request()->thump_image->getClientOriginalName();
                    if($request->thump_image->storeAs('/',$fileName,'blogs')) {
                        $blog->thump_image = $fileName;
                        $blog->thump_alt = $request->thump_alt;
                        $blog->save();
                    }
                }
                if(request()->image1) {
                    //$fileName = "blog_".$blog->id .'_1.'.request()->image1->getClientOriginalExtension();
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'blogs')) {
                        $blog->image1 = $fileName;
                        $blog->image1_alt = $request->image1_alt;
                        $blog->save();
                    }
                }
                if(request()->image2) {
                    //$fileName = "blog_".$blog->id .'_2.'.request()->image2->getClientOriginalExtension();
                    $fileName = request()->image2->getClientOriginalName();
                    if($request->image2->storeAs('/',$fileName,'blogs')) {
                        $blog->image2 = $fileName;
                        $blog->image2_alt = $request->image2_alt;
                        $blog->save();
                    }
                }
                if(request()->image3) {
                    //$fileName = "blog_".$blog->id .'_3.'.request()->image3->getClientOriginalExtension();
                    $fileName = request()->image3->getClientOriginalName();
                    if($request->image3->storeAs('/',$fileName,'blogs')) {
                        $blog->image3 = $fileName;
                        $blog->image3_alt = $request->image3_alt;
                        $blog->save();
                    }
                }
                if(request()->image4) {
                    //$fileName = "blog_".$blog->id .'_4.'.request()->image4->getClientOriginalExtension();
                    $fileName = request()->image4->getClientOriginalName();
                    if($request->image4->storeAs('/',$fileName,'blogs')) {
                        $blog->image4 = $fileName;
                        $blog->image4_alt = $request->image4_alt;
                        $blog->save();
                    }
                }
                if(request()->image5) {
                    //$fileName = "blog_".$blog->id .'_5.'.request()->image5->getClientOriginalExtension();
                    $fileName = request()->image5->getClientOriginalName();
                    if($request->image5->storeAs('/',$fileName,'blogs')) {
                        $blog->image5 = $fileName;
                        $blog->image5_alt = $request->image5_alt;
                        $blog->save();
                    }
                }



                $request->session()->flash("Success",$blog->blog_title. " has bas been added");
                return redirect()->route('admin.blogs.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the blog");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.blogs.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.blogs.index'));
        }
        $maincategory = BlgCatg::all();
        $blogs = Blog::find($id);

        return view('admin.blogs.edit')->with([
            'blogs'=>$blogs,
            'maincategory' => $maincategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.blogs.index'));
        }
    
        request()->validate([
            'catg_id' => ['required', 'string'],
            'blog_title' => ['required', 'string', 'max:255'],
            'url_slug' => ['required', 'string', 'max:255','alpha_dash'],
            'thump_image.*' => ['mimes:jpeg,jpg|max:2048'],
            'image1.*' => ['mimes:jpeg,jpg|max:2048'],
            'image2.*' => ['mimes:jpeg,jpg|max:2048'],
            'image3.*' => ['mimes:jpeg,jpg|max:2048'],
            'image4.*' => ['mimes:jpeg,jpg|max:2048'],
            'image5.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $blog = Blog::find($id);
            $blog->catg_id = $request->catg_id;
            $blog->blog_title  = $request->blog_title ;
            $blog->blog_date = $request->blog_date;
            $blog->short_description = $request->short_description;
            $blog->blog_content = $request->blog_content;
            $blog->keywords = $request->keywords;
            $blog->metatags = $request->metatags;
            $blog->url_slug = $request->url_slug;
            $blog->disp_order = $request->disp_order;

            if($blog->save()) {
                if(request()->thump_image) {
                    //$fileName = "blog_".$blog->id .'_t.'.request()->thump_image->getClientOriginalExtension();
                    $fileName = request()->thump_image->getClientOriginalName();
                    if($request->thump_image->storeAs('/',$fileName,'blogs')) {
                        $blog->thump_image = $fileName;
                        $blog->thump_alt = $request->thump_alt;
                        $blog->save();
                    }
                }
                if(request()->image1) {
                    //$fileName = "blog_".$blog->id .'_1.'.request()->image1->getClientOriginalExtension();
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'blogs')) {
                        $blog->image1 = $fileName;
                        $blog->image1_alt = $request->image1_alt;
                        $blog->save();
                    }
                }
                if(request()->image2) {
                    //$fileName = "blog_".$blog->id .'_2.'.request()->image2->getClientOriginalExtension();
                    $fileName = request()->image2->getClientOriginalName();
                    if($request->image2->storeAs('/',$fileName,'blogs')) {
                        $blog->image2 = $fileName;
                        $blog->image2_alt = $request->image2_alt;
                        $blog->save();
                    }
                }
                if(request()->image3) {
                    //$fileName = "blog_".$blog->id .'_3.'.request()->image3->getClientOriginalExtension();
                    $fileName = request()->image3->getClientOriginalName();
                    if($request->image3->storeAs('/',$fileName,'blogs')) {
                        $blog->image3 = $fileName;
                        $blog->image3_alt = $request->image3_alt;
                        $blog->save();
                    }
                }
                if(request()->image4) {
                    //$fileName = "blog_".$blog->id .'_4.'.request()->image4->getClientOriginalExtension();
                    $fileName = request()->image4->getClientOriginalName();
                    if($request->image4->storeAs('/',$fileName,'blogs')) {
                        $blog->image4 = $fileName;
                        $blog->image4_alt = $request->image4_alt;
                        $blog->save();
                    }
                }
                if(request()->image5) {
                    //$fileName = "blog_".$blog->id .'_5.'.request()->image5->getClientOriginalExtension();
                    $fileName = request()->image5->getClientOriginalName();
                    if($request->image5->storeAs('/',$fileName,'blogs')) {
                        $blog->image5 = $fileName;
                        $blog->image5_alt = $request->image5_alt;
                        $blog->save();
                    }
                }
                
                $request->session()->flash("Success",$blog->blog_title. " has bas been updated");
                return redirect()->route('admin.blogs.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the blog");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.blogs.edit',$blog->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.blogs.index'));
        }

        $blog = Blog::find($id);
        $blog->delete();

        return redirect()->route('admin.blogs.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.blogs.index'));
        }

        try {
            $blog = Blog::find($request->id);
            $blog->status = $request->status;
            if($blog->save()) {
                return "Success";
            }
            else {
                return "Failed";
            }
        }
        catch (Exception $ex) {
            return "Failed";
        } 
    }
}
