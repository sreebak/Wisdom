<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\SerCatg;
use Exception;
use Gate;

class SerCatgsController extends Controller
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
        $categories = SerCatg::all();
        return view('admin.sercategories.index')->with('categories',$categories);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.sercategories.index'));
        }
        return view('admin.sercategories.new');        
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
            return redirect(route('admin.sercategories.index'));
        }

        request()->validate([
            'catg_name' => ['required', 'string', 'max:255', 'unique:ser_categories'],
            'url_slug' => ['required', 'string', 'max:255', 'unique:ser_categories','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $sercatg = new SerCatg;
            $sercatg->catg_name = $request->catg_name;
            $sercatg->url_slug = $request->url_slug;
            $sercatg->disp_order = $request->disp_order;
            $sercatg->image = '';

            if($sercatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$sercatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image->getClientOriginalName();
                    if($request->image->storeAs('/',$fileName,'serviceCategory')) {
                        $sercatg->image = $fileName;
                        $sercatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$sercatg->catg_name. " has bas been added");
                return redirect()->route('admin.sercategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.sercategories.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SerCatg  $serCatg
     * @return \Illuminate\Http\Response
     */
    public function show(SerCatg $serCatg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SerCatg  $serCatg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Gate::denies('edit-data')) {
            return redirect(route('admin.sercategories.index'));
        }
        
        $sercatg = SerCatg::find($id);

        return view('admin.sercategories.edit')->with([
            'sercatg'=>$sercatg
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SerCatg  $serCatg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.sercategories.index'));
        }
        
        request()->validate([
            'catg_name' => ['required', 'string', 'max:255'],
            'url_slug' => ['required', 'string', 'max:255','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $sercatg = SerCatg::find($id);
            $sercatg->catg_name = $request->catg_name;
            $sercatg->url_slug = $request->url_slug;
            $sercatg->disp_order = $request->disp_order;

            if($sercatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$sercatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image->getClientOriginalName();
                    if($request->image->storeAs('/',$fileName,'serviceCategory')) {
                        $sercatg->image = $fileName;
                        $sercatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$sercatg->catg_name. " has bas been updated");
                return redirect()->route('admin.sercategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.sercategories.edit',$sercatg->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SerCatg  $serCatg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.sercategories.index'));
        }

        $sercatg = SerCatg::find($id);
        
        try {
            $sercatg->delete();
        }
        catch(Exception $ex) {
            $request->session()->flash("Error","Deletion Failed - Child items are existing");
        }    


        return redirect()->route('admin.sercategories.index');
    }


    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.sercategories.index'));
        }

        try {
            $sercatg = SerCatg::find($request->id);
            $sercatg->status = $request->status;
            if($sercatg->save()) {
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
