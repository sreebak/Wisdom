<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Questionpaper;
use App\Questionpaperdownload;
use Exception;
use Gate;

class QuestionpaperController extends Controller
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
        $questionpapers = Questionpaper::all();
        return view('admin.questionpapers.index')->with('questionpapers',$questionpapers);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.questionpapers.index'));
        }
        return view('admin.questionpapers.new');        
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
            return redirect(route('admin.questionpapers.index'));
        }

        request()->validate([
            'title' => ['required', 'string', 'max:255', 'unique:question_papers'],
            'file.*' => ['mimes:pdf,xlx,csv|max:2048'],
        ]);        

        try {
            
            $questionpaper = new Questionpaper;
            $questionpaper->title = $request->title;
            $questionpaper->disp_order = $request->disp_order;
            $questionpaper->file = '';

            if($questionpaper->save()) {
                if(request()->file) {
                    //$fileName = "pcatg_".$questionpaper->id .'.'.request()->file->getClientOriginalExtension();
                    $fileName = request()->file->getClientOriginalName();
                   // if($request->file->storeAs('/',$fileName,'galleryCategory')) {
                    if($request->file->move(public_path('storage/questionpapers'), $fileName)) {
                        $questionpaper->file = $fileName;
                        $questionpaper->save();
                    }
                    
                }
                $request->session()->flash("Success",$questionpaper->title. " has bas been added");
                return redirect()->route('admin.questionpapers.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the questionpaper");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.questionpapers.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questionpaper  $glyCatg
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
            return redirect(route('admin.questionpapers.index'));
        }
        
        $questionpapers = Questionpaper::find($id);

        return view('admin.questionpapers.edit')->with([
            'questionpapers'=>$questionpapers
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
            return redirect(route('admin.questionpapers.index'));
        }
        
        request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'file.*' => ['mimes:pdf,xlx,csv|max:2048'],
        ]);        

        try {
            
            $questionpapers = Questionpaper::find($id);
            $questionpapers->title = $request->title;
            $questionpapers->disp_order = $request->disp_order;

            if($questionpapers->save()) {
                if(request()->file) {
                    //$fileName = "pcatg_".$questionpapers->id .'.'.request()->file->getClientOriginalExtension();
                    $fileName = request()->file->getClientOriginalName();
                    //if($request->file->storeAs('/',$fileName,'galleryCategory')) {
                    if($request->file->move(public_path('storage/questionpapers'), $fileName)) {
                        $questionpapers->file = $fileName;
                        $questionpapers->save();
                    }
                    
                }
                $request->session()->flash("Success",$questionpapers->title. " has bas been updated");
                return redirect()->route('admin.questionpapers.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the question paper");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.questionpapers.edit',$questionpapers->id);
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
            return redirect(route('admin.questionpapers.index'));
        }

        $questionpapers = Questionpaper::find($id);

        try {
            $questionpapers->delete();
        }
        catch(Exception $ex) {
            $request->session()->flash("Error","Deletion Failed - Child items are existing");
        }        

        return redirect()->route('admin.questionpapers.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.questionpapers.index'));
        }

        try {
            $questionpapers = Questionpaper::find($request->id);
            $questionpapers->status = $request->status;
            if($questionpapers->save()) {
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
    public function questionPapersUsers()
    {
        $questionpapers_users = Questionpaperdownload::all();
        return view('admin.questionpapers.users')->with('questionpapers_users',$questionpapers_users);   
    }
}
