<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Faq;
use Exception;
use Gate;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faqs.index')->with([
            'faqs' => $faqs,
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
            return redirect(route('admin.faqs.index'));
        }
       
        return view('admin.faqs.new');
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
            return redirect(route('admin.faqs.index'));
        }

        request()->validate([
            'question' => ['required','string'],
            'answer' => ['required','string'],
        ]);        

        try {
            
            $faq = new Faq;
            $faq->question  = $request->question ;
            $faq->answer  = $request->answer;
            $faq->disp_order = $request->disp_order;

            if($faq->save()) {
                $request->session()->flash("Success","FAQ has bas been added");
                return redirect()->route('admin.faqs.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the faq");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.faqs.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.faqs.index'));
        }

        $faqs = Faq::find($id);

        return view('admin.faqs.edit')->with([
            'faqs'=>$faqs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.faqs.index'));
        }
    
        request()->validate([
            'question' => ['required','string'],
            'answer' => ['required','string'],
        ]);             

        try {
            
            $faq = Faq::find($id);
            $faq->question  = $request->question ;
            $faq->answer  = $request->answer;
            $faq->disp_order = $request->disp_order;

            if($faq->save()) {
                $request->session()->flash("Success","FAQ has bas been updated");
                return redirect()->route('admin.faqs.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the faq");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.faqs.edit',$faq->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.faqs.index'));
        }

        $faq = Faq::find($id);
        $faq->delete();

        return redirect()->route('admin.faqs.index');
    }


    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.faqs.index'));
        }

        try {
            $faq = Faq::find($request->id);
            $faq->status = $request->status;
            if($faq->save()) {
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
