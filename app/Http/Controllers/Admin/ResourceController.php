<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources =Resource::all();
        return view('admin.resources.index',compact('resources')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.resources.index'));
        }
       $courses=Product::where('status',1)->get();
        return view('admin.resources.new',compact('courses'));
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
            return redirect(route('admin.resources.index'));
        }

        request()->validate([
            'title' => 'required',
            'description' => 'required', 
            'file' => 'required',
        ]);        

        try {
            
            $resource = new Resource;
            $resource->title  = $request->title ;
            $resource->description  = $request->description;
            $resource->owner  = $request->owner;
            $resource->start_date  = $request->start_date;
            $resource->views = $request->view;
            $resource->course_id = $request->course_id;
            $resource->file = '';
            if($resource->save()) {
                if(request()->file) {

                    // $fileName = time().'.'.$request->file->extension();  
   
                    // $request->file->move(public_path('uploads'), $fileName);

                    $fileName = request()->file->getClientOriginalName();
                    if($request->file->storeAs('/',$fileName,'resource')) {
                        $resource->file = $fileName;
                        
                        $resource->save();
                    }
                }
                $request->session()->flash("Success","Resource has bas been added");
                return redirect()->route('admin.resources.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the tutor");
            }
        }
        catch(\Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.resources.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.resources.index'));
        }

        $resource = Resource::find($resource->id);
        $courses=Product::where('status',1)->get();


        return view('admin.resources.edit',compact('resource','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.resources.index'));
        }
    
        request()->validate([
            'title' => 'required',
            'description' => 'required', 
            'file' => 'required',
        ]);             

        try {
            
            $resource = Resource::find($resource->id);
            $resource->title  = $request->title ;
            $resource->description  = $request->description;
            $resource->owner  = $request->owner;
            $resource->start_date  = $request->start_date;
            $resource->views = $request->view;
            $resource->course_id = $request->course_id;

            if($resource->save()) {
                if(request()->file) {

                    // $fileName = time().'.'.$request->file->extension();  
   
                    // $request->file->move(public_path('uploads'), $fileName);

                    $fileName = request()->file->getClientOriginalName();
                    if($request->file->storeAs('/',$fileName,'resource')) {
                        $resource->file = $fileName;
                        
                        $resource->save();
                    }
                }

                $request->session()->flash("Success","Topic has bas been updated");
                return redirect()->route('admin.resources.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the topic");
            }
        }
        catch(\Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.resources.edit',$resource->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.resources.index'));
        }

        $resource = Resource::find($resource->id);
        $resource->delete();

        return redirect()->route('admin.resources.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.resources.index'));
        }

        try {
            $resource = Resource::find($request->id);
            $resource->status = $request->status;
            if($resource->save()) {
                return "Success";
            }
            else {
                return "Failed";
            }
        }
        catch (\Exception $ex) {
            return "Failed";
        } 
    }
}
