<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\GlyCatg;
use App\Gallery;
use Exception;
use Gate;

class GallerysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = Gallery::with('categories')->get();
        return view('admin.gallerys.index')->with([
            'gallerys' => $gallerys,
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
            return redirect(route('admin.gallerys.index'));
        }
        $maincategory = GlyCatg::all();
       
        return view('admin.gallerys.new')->with([
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
            return redirect(route('admin.gallerys.index'));
        }

        request()->validate([
            'catg_id' => ['required', 'string'],
            'image_title' => ['required', 'string', 'max:255', 'unique:gallerys'],
            'url_slug' => ['required','string', 'max:255', 'unique:gallerys','alpha_dash'],
            'thump_image.*' => ['mimes:jpeg,jpg|max:2048'],
            'image1.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $gallery = new Gallery;
            $gallery->catg_id = $request->catg_id;
            $gallery->image_title  = $request->image_title ;
            $gallery->short_description  = $request->short_description ;
            $gallery->url_slug = $request->url_slug;
            $gallery->disp_order = $request->disp_order;
            $gallery->thump_image = '';
            $gallery->thump_alt = '';
            $gallery->image1 = '';
            $gallery->image1_alt = '';

            if($gallery->save()) {
                if(request()->thump_image) {
                    //$fileName = "gallery_".$gallery->id .'_t.'.request()->thump_image->getClientOriginalExtension();
                    $fileName = request()->thump_image->getClientOriginalName();
                    if($request->thump_image->storeAs('/',$fileName,'gallerys')) {
                        $gallery->thump_image = $fileName;
                        $gallery->thump_alt = $request->thump_alt;
                        $gallery->save();
                    }
                }
                if(request()->image1) {
                    //$fileName = "gallery_".$gallery->id .'_1.'.request()->image1->getClientOriginalExtension();
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'gallerys')) {
                        $gallery->image1 = $fileName;
                        $gallery->image1_alt = $request->image1_alt;
                        $gallery->save();
                    }
                }

                $request->session()->flash("Success",$gallery->image_title. " has bas been added");
                return redirect()->route('admin.gallerys.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the gallery");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.gallerys.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.gallerys.index'));
        }
        $maincategory = GlyCatg::all();
        $gallerys = Gallery::find($id);

        return view('admin.gallerys.edit')->with([
            'gallerys'=>$gallerys,
            'maincategory' => $maincategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.gallerys.index'));
        }
    
        request()->validate([
            'catg_id' => ['required', 'string'],
            'image_title' => ['required', 'string', 'max:255'],
            'url_slug' => ['required', 'string', 'max:255','alpha_dash'],
            'thump_image.*' => ['mimes:jpeg,jpg|max:2048'],
            'image1.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $gallery = Gallery::find($id);
            $gallery->catg_id = $request->catg_id;
            $gallery->image_title  = $request->image_title ;
            $gallery->short_description  = $request->short_description ;
            $gallery->url_slug = $request->url_slug;
            $gallery->disp_order = $request->disp_order;

            if($gallery->save()) {
                if(request()->thump_image) {
                    //$fileName = "gallery_".$gallery->id .'_t.'.request()->thump_image->getClientOriginalExtension();
                    $fileName = request()->thump_image->getClientOriginalName();
                    if($request->thump_image->storeAs('/',$fileName,'gallerys')) {
                        $gallery->thump_image = $fileName;
                        $gallery->thump_alt = $request->thump_alt;
                        $gallery->save();
                    }
                }
                if(request()->image1) {
                    //$fileName = "gallery_".$gallery->id .'_1.'.request()->image1->getClientOriginalExtension();
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'gallerys')) {
                        $gallery->image1 = $fileName;
                        $gallery->image1_alt = $request->image1_alt;
                        $gallery->save();
                    }
                }
                
                $request->session()->flash("Success",$gallery->image_title. " has bas been updated");
                return redirect()->route('admin.gallerys.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the gallery");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.gallerys.edit',$gallery->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.gallerys.index'));
        }

        $gallery = Gallery::find($id);
        $gallery->delete();

        return redirect()->route('admin.gallerys.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.gallerys.index'));
        }

        try {
            $gallery = Gallery::find($request->id);
            $gallery->status = $request->status;
            if($gallery->save()) {
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
