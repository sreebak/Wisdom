<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\PjxCatg;
use Exception;
use Gate;

class PjxCatgsController extends Controller
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
        $categories = PjxCatg::all();
        return view('admin.pjxcategories.index')->with('categories',$categories);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.pjxcategories.index'));
        }
        return view('admin.pjxcategories.new');        
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
            return redirect(route('admin.pjxcategories.index'));
        }

        request()->validate([
            'catg_name' => ['required', 'string', 'max:255', 'unique:pjx_categories'],
            'url_slug' => ['required', 'string', 'max:255', 'unique:pjx_categories','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $pjxcatg = new PjxCatg;
            $pjxcatg->catg_name = $request->catg_name;
            $pjxcatg->url_slug = $request->url_slug;
            $pjxcatg->disp_order = $request->disp_order;
            $pjxcatg->image = '';

            if($pjxcatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$pjxcatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image->getClientOriginalName();
                    if($request->image->storeAs('/',$fileName,'projectCategory')) {
                        $pjxcatg->image = $fileName;
                        $pjxcatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$pjxcatg->catg_name. " has bas been added");
                return redirect()->route('admin.pjxcategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.pjxcategories.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PjxCatg  $pjxCatg
     * @return \Illuminate\Http\Response
     */
    public function show(PjxCatg $pjxCatg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PjxCatg  $pjxCatg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Gate::denies('edit-data')) {
            return redirect(route('admin.pjxcategories.index'));
        }
        
        $pjxcatg = PjxCatg::find($id);

        return view('admin.pjxcategories.edit')->with([
            'pjxcatg'=>$pjxcatg
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PjxCatg  $pjxCatg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.pjxcategories.index'));
        }
        
        request()->validate([
            'catg_name' => ['required', 'string', 'max:255'],
            'url_slug' => ['required', 'string', 'max:255','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $pjxcatg = PjxCatg::find($id);
            $pjxcatg->catg_name = $request->catg_name;
            $pjxcatg->url_slug = $request->url_slug;
            $pjxcatg->disp_order = $request->disp_order;

            if($pjxcatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$pjxcatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image->getClientOriginalName();
                    if($request->image->storeAs('/',$fileName,'projectCategory')) {
                        $pjxcatg->image = $fileName;
                        $pjxcatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$pjxcatg->catg_name. " has bas been updated");
                return redirect()->route('admin.pjxcategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.pjxcategories.edit',$pjxcatg->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PjxCatg  $pjxCatg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.pjxcategories.index'));
        }

        $pjxcatg = PjxCatg::find($id);
        
        try {
            $pjxcatg->delete();
        }
        catch(Exception $ex) {
            $request->session()->flash("Error","Deletion Failed - Child items are existing");
        }              

        return redirect()->route('admin.pjxcategories.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.pjxcategories.index'));
        }

        try {
            $pjxcatg = PjxCatg::find($request->id);
            $pjxcatg->status = $request->status;
            if($pjxcatg->save()) {
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
