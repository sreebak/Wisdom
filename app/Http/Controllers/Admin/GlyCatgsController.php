<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\GlyCatg;
use Exception;
use Gate;

class GlyCatgsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = GlyCatg::all();
        return view('admin.glycategories.index')->with('categories',$categories);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.glycategories.index'));
        }
        return view('admin.glycategories.new');        
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
            return redirect(route('admin.glycategories.index'));
        }

        request()->validate([
            'catg_name' => ['required', 'string', 'max:255', 'unique:gly_categories'],
            'url_slug' => ['required', 'string', 'max:255', 'unique:gly_categories','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $glycatg = new GlyCatg;
            $glycatg->catg_name = $request->catg_name;
            $glycatg->url_slug = $request->url_slug;
            $glycatg->disp_order = $request->disp_order;
            $glycatg->image = '';

            if($glycatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$glycatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image->getClientOriginalName();
                   // if($request->image->storeAs('/',$fileName,'galleryCategory')) {
                    if($request->image->move(public_path('storage/galleryCategory'), $fileName)) {
                        $glycatg->image = $fileName;
                        $glycatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$glycatg->catg_name. " has bas been added");
                return redirect()->route('admin.glycategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.glycategories.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GlyCatg  $glyCatg
     * @return \Illuminate\Http\Response
     */
    public function show(GlyCatg $glyCatg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GlyCatg  $glyCatg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Gate::denies('edit-data')) {
            return redirect(route('admin.glycategories.index'));
        }
        
        $glycatg = GlyCatg::find($id);

        return view('admin.glycategories.edit')->with([
            'glycatg'=>$glycatg
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GlyCatg  $glyCatg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.glycategories.index'));
        }
        
        request()->validate([
            'catg_name' => ['required', 'string', 'max:255'],
            'url_slug' => ['required', 'string', 'max:255','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $glycatg = GlyCatg::find($id);
            $glycatg->catg_name = $request->catg_name;
            $glycatg->url_slug = $request->url_slug;
            $glycatg->disp_order = $request->disp_order;

            if($glycatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$glycatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image->getClientOriginalName();
                    //if($request->image->storeAs('/',$fileName,'galleryCategory')) {
                    if($request->image->move(public_path('storage/galleryCategory'), $fileName)) {
                        $glycatg->image = $fileName;
                        $glycatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$glycatg->catg_name. " has bas been updated");
                return redirect()->route('admin.glycategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.glycategories.edit',$glycatg->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GlyCatg  $glyCatg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.glycategories.index'));
        }

        $glycatg = GlyCatg::find($id);

        try {
            $glycatg->delete();
        }
        catch(Exception $ex) {
            $request->session()->flash("Error","Deletion Failed - Child items are existing");
        }        

        return redirect()->route('admin.glycategories.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.glycategories.index'));
        }

        try {
            $glycatg = GlyCatg::find($request->id);
            $glycatg->status = $request->status;
            if($glycatg->save()) {
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
