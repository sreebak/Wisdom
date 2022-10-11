<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\PdtCatg;
use App\PdtSubCatg;
use Exception;
use Gate;

class PdtSubCatgsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = PdtSubCatg::with('categories')->get();
        return view('admin.pdtsubcategories.index')->with([
            'subcategories'=>$subcategories,
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
            return redirect(route('admin.pdtsubcategories.index'));
        }
        $maincategory = PdtCatg::all();
        return view('admin.pdtsubcategories.new')->with([
            'maincategory' => $maincategory
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
            return redirect(route('admin.pdtsubcategories.index'));
        }

        request()->validate([
            'catg_id' => ['required', 'string'],
            'sub_catg_name' => ['required', 'string', 'max:255', 'unique:pdt_sub_categories'],
            'url_slug' => ['required', 'string', 'max:255', 'unique:pdt_sub_categories','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $pdtsubcatg = new PdtSubCatg;
            $pdtsubcatg->catg_id = $request->catg_id;
            $pdtsubcatg->sub_catg_name = $request->sub_catg_name;
            $pdtsubcatg->short_description = $request->short_description;
            $pdtsubcatg->long_description = $request->long_description;              
            $pdtsubcatg->url_slug = $request->url_slug;
            $pdtsubcatg->disp_order = $request->disp_order;
            $pdtsubcatg->image = '';

            if($pdtsubcatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$pdtsubcatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image->getClientOriginalName();
                    if($request->image->storeAs('/',$fileName,'productSubCategory')) {
                        $pdtsubcatg->image = $fileName;
                        $pdtsubcatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$pdtsubcatg->sub_catg_name. " has bas been added");
                return redirect()->route('admin.pdtsubcategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the sub category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.pdtsubcategories.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PdtSubCatg  $pdtSubCatg
     * @return \Illuminate\Http\Response
     */
    public function show(PdtSubCatg $pdtSubCatg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PdtSubCatg  $pdtSubCatg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.pdtsubcategories.index'));
        }
        $maincategory = PdtCatg::all();
        $pdtsubcatg = PdtSubCatg::find($id);

        return view('admin.pdtsubcategories.edit')->with([
            'pdtsubcatg'=>$pdtsubcatg,
            'maincategory' => $maincategory
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PdtSubCatg  $pdtSubCatg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.pdtsubcategories.index'));
        }
    
        request()->validate([
            'catg_id' => ['required', 'string'],
            'sub_catg_name' => ['required', 'string', 'max:255'],
            'url_slug' => ['required', 'string', 'max:255','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        



        try {
            
            $pdtsubcatg = PdtSubCatg::find($id);
            $pdtsubcatg->catg_id = $request->catg_id;
            $pdtsubcatg->sub_catg_name = $request->sub_catg_name;
            $pdtsubcatg->short_description = $request->short_description;
            $pdtsubcatg->long_description = $request->long_description;              
            $pdtsubcatg->url_slug = $request->url_slug;
            $pdtsubcatg->disp_order = $request->disp_order;

            if($pdtsubcatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$pdtsubcatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image->getClientOriginalName();
                    if($request->image->storeAs('/',$fileName,'productSubCategory')) {
                        $pdtsubcatg->image = $fileName;
                        $pdtsubcatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$pdtsubcatg->sub_catg_name. " has bas been updated");
                return redirect()->route('admin.pdtsubcategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the sub category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.pdtsubcategories.edit',$pdtsubcatg->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PdtSubCatg  $pdtSubCatg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.pdtsubcategories.index'));
        }

        $pdtsubcatg = PdtSubCatg::find($id);
        

        try {
            $pdtsubcatg->delete();
        }
        catch(Exception $ex) {
            $request->session()->flash("Error","Deletion Failed - Child items are existing");
        }        

        return redirect()->route('admin.pdtsubcategories.index');
    }


    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.pdtsubcategories.index'));
        }

        try {
            $pdtsubcatg = PdtSubCatg::find($request->id);
            $pdtsubcatg->status = $request->status;
            if($pdtsubcatg->save()) {
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
