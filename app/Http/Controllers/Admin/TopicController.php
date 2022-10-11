<?php

namespace App\Http\Controllers\Admin;

use App\Topic;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        return view('admin.topics.index',compact('topics')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.topics.index'));
        }
       $courses=Product::where('status',1)->get();
        return view('admin.topics.new',compact('courses'));
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
            return redirect(route('admin.topics.index'));
        }

        request()->validate([
            'title' => ['required','string'],
            'description' => ['required','string'],
        ]);        

        try {
            
            $topic = new Topic;
            $topic->title  = $request->title ;
            $topic->description  = $request->description;
            $topic->course_id=$request->course_id;
            $topic->disp_order = $request->disp_order;

            if($topic->save()) {
                $request->session()->flash("Success","Topic has bas been added");
                return redirect()->route('admin.topics.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the Topic");
            }
        }
        catch(\Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.topics.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.topics.index'));
        }

        $topic = Topic::find($topic->id);
        $courses=Product::where('status',1)->get();


        return view('admin.topics.edit',compact('topic','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.topics.index'));
        }
    
        request()->validate([
            'title' => ['required','string'],
            'description' => ['required','string'],
        ]);             

        try {
            
            $topic = Topic::find($topic->id);
            $topic->title  = $request->title ;
            $topic->description  = $request->description;
            $topic->course_id  = $request->course_id;
            $topic->disp_order = $request->disp_order;

            if($topic->save()) {
                $request->session()->flash("Success","Topic has bas been updated");
                return redirect()->route('admin.topics.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the topic");
            }
        }
        catch(\Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.faqs.edit',$faq->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.topics.index'));
        }

        $topic = Topic::find($topic->id);
        $topic->delete();

        return redirect()->route('admin.topics.index');
    }
    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.topics.index'));
        }

        try {
            $topic = Topic::find($request->id);
            $topic->status = $request->status;
            if($topic->save()) {
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
