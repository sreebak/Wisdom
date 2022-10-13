<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Slider;
use Exception;
use Gate;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index')->with([
            'sliders' => $sliders,
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
            return redirect(route('admin.sliders.index'));
        }
       
        return view('admin.sliders.new');
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
            return redirect(route('admin.sliders.index'));
        }

        request()->validate([
            'image_title' => ['string', 'max:255'],
            'image1.*' => ['required','mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $slider = new Slider;
            $slider->image_title  = $request->image_title ;
            $slider->short_description  = $request->short_description ;
            $slider->readmore_txt = $request->readmore_txt;
            $slider->url_slug = $request->url_slug;
            $slider->disp_order = $request->disp_order;
            $slider->image1 = '';
            $slider->image1_alt = '';

            if($slider->save()) {
                if(request()->image1) {
                    //$fileName = "slider_".$slider->id .'_1.'.request()->image1->getClientOriginalExtension();
                    $fileName = request()->image1->getClientOriginalName();
                    //if($request->image1->move(public_path('storage/sliders'), $fileName)) {
                    if($request->image1->storeAs('/',$fileName,'sliders')) {
                        $slider->image1 = $fileName;
                        $slider->image1_alt = $request->image1_alt;
                        $slider->save();
                    }
                }

                $request->session()->flash("Success",$slider->image_title. " has bas been added");
                return redirect()->route('admin.sliders.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the slider");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.sliders.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.sliders.index'));
        }

        $sliders = Slider::find($id);

        return view('admin.sliders.edit')->with([
            'sliders'=>$sliders
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.sliders.index'));
        }
    
        request()->validate([
            'image_title' => ['string', 'max:255'],
            'image1.*' => ['required','mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $slider = Slider::find($id);
            $slider->image_title  = $request->image_title ;
            $slider->short_description  = $request->short_description ;
            $slider->readmore_txt = $request->readmore_txt;
            $slider->url_slug = $request->url_slug;
            $slider->disp_order = $request->disp_order;

            if($slider->save()) {
                if(request()->image1) {
                    //$fileName = "slider_".$slider->id .'_1.'.request()->image1->getClientOriginalExtension();
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'sliders')) {
                        $slider->image1 = $fileName;
                        $slider->image1_alt = $request->image1_alt;
                        $slider->save();
                    }
                }
                
                $request->session()->flash("Success",$slider->image_title. " has bas been updated");
                return redirect()->route('admin.sliders.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the slider");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.sliders.edit',$slider->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.sliders.index'));
        }

        $slider = Slider::find($id);
        $slider->delete();

        return redirect()->route('admin.sliders.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.sliders.index'));
        }

        try {
            $slider = Slider::find($request->id);
            $slider->status = $request->status;
            if($slider->save()) {
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
