<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\BlgCatg;
use Exception;
use Gate;

class BlgCatgsController extends Controller
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
        $categories = BlgCatg::all();
        return view('admin.blgcategories.index')->with('categories',$categories);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.blgcategories.index'));
        }
        return view('admin.blgcategories.new');        
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
            return redirect(route('admin.blgcategories.index'));
        }

        request()->validate([
            'catg_name' => ['required', 'string', 'max:255', 'unique:blg_categories'],
            'url_slug' => ['required', 'string', 'max:255', 'unique:blg_categories','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $blgcatg = new BlgCatg;
            $blgcatg->catg_name = $request->catg_name;
            $blgcatg->url_slug = $request->url_slug;
            $blgcatg->disp_order = $request->disp_order;
            $blgcatg->image = '';

            if($blgcatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$blgcatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image->getClientOriginalName();
                    if($request->image->storeAs('/',$fileName,'blogCategory')) {
                        $blgcatg->image = $fileName;
                        $blgcatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$blgcatg->catg_name. " has bas been added");
                return redirect()->route('admin.blgcategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.blgcategories.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlgCatg  $blgCatg
     * @return \Illuminate\Http\Response
     */
    public function show(BlgCatg $blgCatg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlgCatg  $blgCatg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Gate::denies('edit-data')) {
            return redirect(route('admin.blgcategories.index'));
        }
        
        $blgcatg = BlgCatg::find($id);

        return view('admin.blgcategories.edit')->with([
            'blgcatg'=>$blgcatg
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlgCatg  $blgCatg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.blgcategories.index'));
        }
        
        request()->validate([
            'catg_name' => ['required', 'string', 'max:255'],
            'url_slug' => ['required', 'string', 'max:255','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $blgcatg = BlgCatg::find($id);
            $blgcatg->catg_name = $request->catg_name;
            $blgcatg->url_slug = $request->url_slug;
            $blgcatg->disp_order = $request->disp_order;

            if($blgcatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$blgcatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image->getClientOriginalName();
                    if($request->image->storeAs('/',$fileName,'blogCategory')) {
                        $blgcatg->image = $fileName;
                        $blgcatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$blgcatg->catg_name. " has bas been updated");
                return redirect()->route('admin.blgcategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.blgcategories.edit',$blgcatg->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlgCatg  $blgCatg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.blgcategories.index'));
        }

        $blgcatg = BlgCatg::find($id);
        
        try {
            $blgcatg->delete();
        }
        catch(Exception $ex) {
            $request->session()->flash("Error","Deletion Failed - Child items are existing");
        }           

        return redirect()->route('admin.blgcategories.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.blgcategories.index'));
        }

        try {
            $blgcatg = BlgCatg::find($request->id);
            $blgcatg->status = $request->status;
            if($blgcatg->save()) {
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
