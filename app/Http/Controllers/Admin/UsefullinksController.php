<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Usefullinks;
use Exception;
use Gate;

class UsefullinksController extends Controller
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
        $usefullinks = Usefullinks::all();
        return view('admin.usefullinks.index')->with('usefullinks',$usefullinks);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.usefullinks.index'));
        }
        return view('admin.usefullinks.new');        
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
            return redirect(route('admin.usefullinks.index'));
        }

        request()->validate([
            'link_name' => ['required', 'string', 'max:255', 'unique:useful_links'],
            'link_url' => ['required', 'string', 'max:255', 'unique:useful_links'],
            
        ]);        

        try {
            
            $usefullinks = new Usefullinks;
            $usefullinks->link_name = $request->link_name;
            $usefullinks->link_url = $request->link_url;
            $usefullinks->disp_order = $request->disp_order;
          
            if($usefullinks->save()) {
              
                $request->session()->flash("Success",$usefullinks->link_name. " has bas been added");
                return redirect()->route('admin.usefullinks.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the link");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.usefullinks.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usefullinks  $usefullinks
     * @return \Illuminate\Http\Response
     */
    public function show(Usefullinks $usefullinks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usefullinks  $usefullinks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Gate::denies('edit-data')) {
            return redirect(route('admin.usefullinks.index'));
        }
        
        $usefullinks = Usefullinks::find($id);

        return view('admin.usefullinks.edit')->with([
            'usefullinks'=>$usefullinks
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usefullinks  $usefullinks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.usefullinks.index'));
        }
        
        request()->validate([
            'link_name' => ['required', 'string', 'max:255'],
            'link_url' => ['required', 'string', 'max:255'],
        ]);        

        try {
            
            $usefullinks = Usefullinks::find($id);
            $usefullinks->link_name = $request->link_name;            
            $usefullinks->link_url = $request->link_url;
            $usefullinks->disp_order = $request->disp_order;

            if($usefullinks->save()) {
                $request->session()->flash("Success",$usefullinks->link_name. " has bas been updated");
                return redirect()->route('admin.usefullinks.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the link");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.usefullinks.edit',$usefullinks->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usefullinks  $usefullinks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.usefullinks.index'));
        }

        $usefullinks = Usefullinks::find($id);

        try {
            $usefullinks->delete();
        }
        catch(Exception $ex) {
            $request->session()->flash("Error","Deletion Failed - Child items are existing");
        }
        return redirect()->route('admin.usefullinks.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.usefullinks.index'));
        }

        try {
            $usefullinks = Usefullinks::find($request->id);
            $usefullinks->status = $request->status;
            if($usefullinks->save()) {
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
