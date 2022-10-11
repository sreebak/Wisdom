<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\SerCatg;
use App\SerSubCatg;
use Exception;
use Gate;

class SerSubCatgsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SerSubCatg::with('categories')->get();
        return view('admin.sersubcategories.index')->with([
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
            return redirect(route('admin.sersubcategories.index'));
        }
        $maincategory = SerCatg::all();
        return view('admin.sersubcategories.new')->with([
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
            return redirect(route('admin.sersubcategories.index'));
        }

        request()->validate([
            'catg_id' => ['required', 'string'],
            'sub_catg_name' => ['required', 'string', 'max:255', 'unique:ser_sub_categories'],
            'url_slug' => ['required', 'string', 'max:255', 'unique:ser_sub_categories','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $sersubcatg = new SerSubCatg;
            $sersubcatg->catg_id = $request->catg_id;
            $sersubcatg->sub_catg_name = $request->sub_catg_name;
            $sersubcatg->url_slug = $request->url_slug;
            $sersubcatg->disp_order = $request->disp_order;
            $sersubcatg->image = '';

            if($sersubcatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$sersubcatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image->getClientOriginalName();
                    if($request->image->storeAs('/',$fileName,'serviceSubCategory')) {
                        $sersubcatg->image = $fileName;
                        $sersubcatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$sersubcatg->sub_catg_name. " has bas been added");
                return redirect()->route('admin.sersubcategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the sub category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.sersubcategories.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SerSubCatg  $serSubCatg
     * @return \Illuminate\Http\Response
     */
    public function show(SerSubCatg $serSubCatg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SerSubCatg  $serSubCatg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.sersubcategories.index'));
        }
        $maincategory = SerCatg::all();
        $sersubcatg = SerSubCatg::find($id);

        return view('admin.sersubcategories.edit')->with([
            'sersubcatg'=>$sersubcatg,
            'maincategory' => $maincategory
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SerSubCatg  $serSubCatg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.sersubcategories.index'));
        }
    
        request()->validate([
            'catg_id' => ['required', 'string'],
            'sub_catg_name' => ['required', 'string', 'max:255'],
            'url_slug' => ['required', 'string', 'max:255','alpha_dash'],
            'image.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        



        try {
            
            $sersubcatg = SerSubCatg::find($id);
            $sersubcatg->catg_id = $request->catg_id;
            $sersubcatg->sub_catg_name = $request->sub_catg_name;
            $sersubcatg->url_slug = $request->url_slug;
            $sersubcatg->disp_order = $request->disp_order;

            if($sersubcatg->save()) {
                if(request()->image) {
                    //$fileName = "pcatg_".$sersubcatg->id .'.'.request()->image->getClientOriginalExtension();
                    $fileName = request()->image->getClientOriginalName();
                    if($request->image->storeAs('/',$fileName,'serviceSubCategory')) {
                        $sersubcatg->image = $fileName;
                        $sersubcatg->save();
                    }
                    
                }
                $request->session()->flash("Success",$sersubcatg->sub_catg_name. " has bas been updated");
                return redirect()->route('admin.sersubcategories.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the sub category");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.sersubcategories.edit',$sersubcatg->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SerSubCatg  $serSubCatg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.sersubcategories.index'));
        }

        $sersubcatg = SerSubCatg::find($id);
        
        try {
            $sersubcatg->delete();
        }
        catch(Exception $ex) {
            $request->session()->flash("Error","Deletion Failed - Child items are existing");
        }    


        return redirect()->route('admin.sersubcategories.index');
    }


    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.sersubcategories.index'));
        }

        try {
            $sersubcatg = SerSubCatg::find($request->id);
            $sersubcatg->status = $request->status;
            if($sersubcatg->save()) {
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
