<?php

namespace App\Http\Controllers\Admin;

use view;
use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class FeedbackController extends Controller
{
    /*
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $feedbacks =Feedback::all();
       return view('admin.feedbacks.index',compact('feedbacks')); 
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       if(Gate::denies('create-data')) {
           return redirect(route('admin.feedbacks.index'));
       }
       return view('admin.feedbacks.new');
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
           return redirect(route('admin.feedbacks.index'));
       }

       request()->validate([
           'name' => 'required',
           'message' => 'required', 
       ]);        

       try {
           
           $feedback = new Feedback();
           $feedback->name  = $request->name ;
           $feedback->message  = $request->message;
           if($feedback->save()) {
               $request->session()->flash("Success","Feedback has bas been added");
               return redirect()->route('admin.feedbacks.index');
           }
           else {
               $request->session()->flash("Error","There was an error in adding the Feedback");
           }
       }
       catch(\Exception $ex) {
           $request->session()->flash("Error",$ex->getMessage());
       }

      return redirect()->route('admin.feedbacks.create');
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Resource  $resource
    * @return \Illuminate\Http\Response
    */
   public function edit(Feedback $feedback)
   {
       if(Gate::denies('edit-data')) {
           return redirect(route('admin.feedbacks.index'));
       }

       return view('admin.feedbacks.edit',compact('feedback'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Resource  $resource
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Feedback $feedback)
   {
       if(Gate::denies('edit-data')) {
           return redirect(route('admin.feedbacks.index'));
       }
   
       request()->validate([
           'name' => 'required',
           'message' => 'required', 
       ]);             

       try {
           
           $feedback = Feedback::find($feedback->id);
           $feedback->name  = $request->name ;
           $feedback->message  = $request->message;

           if($feedback->save()) {
               $request->session()->flash("Success","Feedback has bas been updated");
               return redirect()->route('admin.feedbacks.index');
           }
           else {
               $request->session()->flash("Error","There was an error in updating the Feedback");
           }
       }
       catch(\Exception $ex) {
           $request->session()->flash("Error",$ex->getMessage());
       }

      return redirect()->route('admin.feedbacks.edit',$feedback->id);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Resource  $resource
    * @return \Illuminate\Http\Response
    */
   public function destroy(Feedback $feedback)
   {
       if(Gate::denies('delete-data')) {
           return redirect(route('admin.feedbacks.index'));
       }

       $feedback = Feedback::find($feedback->id);
       $feedback->delete();

       return redirect()->route('admin.feedbacks.index');
   }

}
