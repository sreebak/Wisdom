<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Testimonial;
use Exception;
use Gate;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index')->with([
            'testimonials' => $testimonials,
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
            return redirect(route('admin.testimonials.index'));
        }
       
        return view('admin.testimonials.new');
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
            return redirect(route('admin.testimonials.index'));
        }

        request()->validate([
            'name' => ['required','string', 'max:50'],
            'image1.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $testimonial = new Testimonial;
            $testimonial->name  = $request->name ;
            $testimonial->email  = $request->email ;
            $testimonial->phone = $request->phone;
            $testimonial->project_title = $request->project_title;
            $testimonial->project_details = $request->project_details;
            $testimonial->project_link = $request->project_link;
            $testimonial->facebook = $request->facebook;
            $testimonial->twiter = $request->twiter;
            $testimonial->linkedin = $request->linkedin;
            $testimonial->designation = $request->designation;
            $testimonial->company = $request->company;
            $testimonial->message = $request->message;
            $testimonial->disp_order = $request->disp_order;
            $testimonial->image1 = '';
            $testimonial->image1_alt = '';

            if($testimonial->save()) {
                if(request()->image1) {
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'testimonials')) {
                        $testimonial->image1 = $fileName;
                        $testimonial->image1_alt = $request->image1_alt;
                        $testimonial->save();
                    }
                }

                $request->session()->flash("Success",$testimonial->name. " has bas been added");
                return redirect()->route('admin.testimonials.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the testimonial");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.testimonials.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.testimonials.index'));
        }

        $testimonials = Testimonial::find($id);

        return view('admin.testimonials.edit')->with([
            'testimonials'=>$testimonials
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.testimonials.index'));
        }
    
        request()->validate([
            'image_title' => ['string', 'max:255'],
            'image1.*' => ['required','mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $testimonial = Testimonial::find($id);
            $testimonial->name  = $request->name ;
            $testimonial->email  = $request->email ;
            $testimonial->phone = $request->phone;
            $testimonial->project_title = $request->project_title;
            $testimonial->project_details = $request->project_details;
            $testimonial->project_link = $request->project_link;
            $testimonial->facebook = $request->facebook;
            $testimonial->twiter = $request->twiter;
            $testimonial->linkedin = $request->linkedin;
            $testimonial->designation = $request->designation;
            $testimonial->company = $request->company;
            $testimonial->message = $request->message;
            $testimonial->disp_order = $request->disp_order;

            if($testimonial->save()) {
                if(request()->image1) {
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'testimonials')) {
                        $testimonial->image1 = $fileName;
                        $testimonial->image1_alt = $request->image1_alt;
                        $testimonial->save();
                    }
                }
                
                $request->session()->flash("Success",$testimonial->name. " has bas been updated");
                return redirect()->route('admin.testimonials.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the testimonial");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.testimonials.edit',$testimonial->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.testimonials.index'));
        }

        $testimonial = Testimonial::find($id);
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.testimonials.index'));
        }

        try {
            $testimonial = Testimonial::find($request->id);
            $testimonial->status = $request->status;
            if($testimonial->save()) {
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
