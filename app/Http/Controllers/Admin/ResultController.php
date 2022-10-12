<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Result;
use Exception;
use Gate;

class ResultController extends Controller
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
        $results = Result::all();
        return view('admin.results.index')->with('results',$results);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.results.index'));
        }
        return view('admin.results.new');        
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
            return redirect(route('admin.results.index'));
        }

        request()->validate([
            'title' => ['required', 'string', 'max:255', 'unique:results'],
            'file.*' => ['mimes:pdf,xlx,csv|max:2048'],
        ]);        

        try {
            
            $result = new Result;
            $result->title = $request->title;
            $result->disp_order = $request->disp_order;
            $result->file = '';

            if($result->save()) {
                if(request()->file) {
                    //$fileName = "pcatg_".$result->id .'.'.request()->file->getClientOriginalExtension();
                    $fileName = request()->file->getClientOriginalName();
                   // if($request->file->storeAs('/',$fileName,'galleryCategory')) {
                    if($request->file->move(public_path('storage/results'), $fileName)) {
                        $result->file = $fileName;
                        $result->save();
                    }
                    
                }
                $request->session()->flash("Success",$result->title. " has bas been added");
                return redirect()->route('admin.results.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the result");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.results.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Gate::denies('edit-data')) {
            return redirect(route('admin.results.index'));
        }
        
        $results = Result::find($id);

        return view('admin.results.edit')->with([
            'results'=>$results
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.results.index'));
        }
        
        request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'file.*' => ['required|file|mimes:pdf,xlx,csv|max:2048'],
        ]);        

        try {
            
            $results = Result::find($id);
            $results->title = $request->title;
            $results->disp_order = $request->disp_order;

            if($results->save()) {
                if(request()->file) {
                    //$fileName = "pcatg_".$results->id .'.'.request()->file->getClientOriginalExtension();
                    $fileName = request()->file->getClientOriginalName();
                    //if($request->file->storeAs('/',$fileName,'galleryCategory')) {
                    if($request->file->move(public_path('storage/results'), $fileName)) {
                        $results->file = $fileName;
                        $results->save();
                    }
                    
                }
                $request->session()->flash("Success",$results->title. " has bas been updated");
                return redirect()->route('admin.results.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the result");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.results.edit',$results->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.results.index'));
        }

        $results = Result::find($id);

        try {
            $results->delete();
        }
        catch(Exception $ex) {
            $request->session()->flash("Error","Deletion Failed - Child items are existing");
        }        

        return redirect()->route('admin.results.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.results.index'));
        }

        try {
            $results = Result::find($request->id);
            $results->status = $request->status;
            if($results->save()) {
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
