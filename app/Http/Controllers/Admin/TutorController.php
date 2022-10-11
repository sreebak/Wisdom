<?php

namespace App\Http\Controllers\Admin;

use App\Tutor;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutors =Tutor::all();
        return view('admin.tutors.index',compact('tutors')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.tutors.index'));
        }
       $courses=Product::where('status',1)->get();
        return view('admin.tutors.new',compact('courses'));
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
            return redirect(route('admin.tutors.index'));
        }

        request()->validate([
            'name' => 'required|string',
            'description' => 'required',
            'image1'=>'required',
            'rating'=>'required'
        ]);        

        try {
            
            $tutor = new Tutor;
            $tutor->name  = $request->name ;
            $tutor->about  = $request->description;
            $tutor->email  = $request->email;
            $tutor->phone  = $request->phone;
            $tutor->rating = $request->rating;

            if($tutor->save()) {
                if(request()->image1) {
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'tutors')) {
                        $tutor->image1 = $fileName;
                        $tutor->image1_alt = $request->image1_alt;
                        $tutor->save();
                    }
                }
                $request->session()->flash("Success","Tutor has bas been added");
                return redirect()->route('admin.tutors.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the tutor");
            }
        }
        catch(\Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.tutors.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show(tutor $tutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit(tutor $tutor)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.tutors.index'));
        }

        $tutor = Tutor::find($tutor->id);
        $courses=Product::where('status',1)->get();


        return view('admin.tutors.edit',compact('tutor','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tutor $tutor)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.tutors.index'));
        }
    
        request()->validate([
            'name' => ['required','string'],
            'about' => ['required','string'],
            'image1'=>'required',
            'rating'=>'required'
        ]);             

        try {
            
            $tutor = Tutor::find($tutor->id);
            $tutor->name  = $request->name ;
            $tutor->about  = $request->about;
            $tutor->email  = $request->email;
            $tutor->phone  = $request->phone;
            $tutor->rating = $request->rating;

            if($tutor->save()) {
                if(request()->image1) {
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'tutors')) {
                        $tutor->image1 = $fileName;
                        $tutor->image1_alt = $request->image1_alt;
                        $tutor->save();
                    }
                }
                $request->session()->flash("Success","Tutor has bas been updated");
                return redirect()->route('admin.tutors.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the topic");
            }
        }
        catch(\Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.tutors.edit',$tutor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(tutor $tutor)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.tutors.index'));
        }

        $tutor = Tutor::find($tutor->id);
        try{
            $tutor->delete();
            session()->flash('Success', 'Successfully deleted');
            return redirect()->route('admin.tutors.index');
        }
        catch(\Exception $ex){
            session()->flash('Error', $ex->getMessage());
            return redirect()->route('admin.tutors.index');
        }
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.tutors.index'));
        }

        try {
            $tutor = Tutor::find($request->id);
            $tutor->status = $request->status;
            if($tutor->save()) {
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
