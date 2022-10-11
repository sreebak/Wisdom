<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\PdtCatg;
use Exception;
use Gate;

class PdtCatgsController extends Controller
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
        $categories = PdtCatg::all();
        return view('admin.pdtcategories.index')->with('categories',$categories);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.pdtcategories.index'));
        }
        return view('admin.pdtcategories.new');        
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
            return redirect(route('admin.pdtcategories.index'));
        }

        request()->validate([
            'catg_name' => ['required', 'string', 'max:255', 'unique:pdt_categories'],
            'url_slug' => ['required', 'string', 'max:255', 'unique:pdt_categories','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $pdtcatg = new PdtCatg;
            $pdtcatg->catg_name = $request->catg_name;
            $pdtcatg->short_description = $request->short_description;
            $pdtcatg->long_description = $request->long_description;              
            $pdtcatg->url_slug = $request->url_slug;
            $pdtcatg->disp_order = $request->disp_order;
            $pdtcatg->image = '';

            if($pdtcatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$pdtcatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image->getClientOriginalName();
                    if($request->image->storeAs('/',$fileName,'productCategory')) {
                        $pdtcatg->image = $fileName;
                        $pdtcatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$pdtcatg->catg_name. " has bas been added");
                return redirect()->route('admin.pdtcategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.pdtcategories.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PdtCatg  $pdtCatg
     * @return \Illuminate\Http\Response
     */
    public function show(PdtCatg $pdtCatg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PdtCatg  $pdtCatg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Gate::denies('edit-data')) {
            return redirect(route('admin.pdtcategories.index'));
        }
        
        $pdtcatg = PdtCatg::find($id);

        return view('admin.pdtcategories.edit')->with([
            'pdtcatg'=>$pdtcatg
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PdtCatg  $pdtCatg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.pdtcategories.index'));
        }
        
        request()->validate([
            'catg_name' => ['required', 'string', 'max:255'],
            'url_slug' => ['required', 'string', 'max:255','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $pdtcatg = PdtCatg::find($id);
            $pdtcatg->catg_name = $request->catg_name;
            $pdtcatg->short_description = $request->short_description;
            $pdtcatg->long_description = $request->long_description;              
            $pdtcatg->url_slug = $request->url_slug;
            $pdtcatg->disp_order = $request->disp_order;

            if($pdtcatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$pdtcatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image->storeAs('/',$fileName,'productCategory')) {
                        $pdtcatg->image = $fileName;
                        $pdtcatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$pdtcatg->catg_name. " has bas been updated");
                return redirect()->route('admin.pdtcategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.pdtcategories.edit',$pdtcatg->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PdtCatg  $pdtCatg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.pdtcategories.index'));
        }

        $pdtcatg = PdtCatg::find($id);

        try {
            $pdtcatg->delete();
        }
        catch(Exception $ex) {
            $request->session()->flash("Error","Deletion Failed - Child items are existing");
        }
        return redirect()->route('admin.pdtcategories.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.pdtcategories.index'));
        }

        try {
            $pdtcatg = PdtCatg::find($request->id);
            $pdtcatg->status = $request->status;
            if($pdtcatg->save()) {
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
