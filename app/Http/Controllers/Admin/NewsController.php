<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\News;
use Exception;
use Gate;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index')->with([
            'news' => $news,
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
            return redirect(route('admin.news.index'));
        }
       
        return view('admin.news.new');
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
            return redirect(route('admin.news.index'));
        }

        request()->validate([
            'news' => ['required','string'],
        ]);        

        try {
            
            $news = new News;
            $news->news  = $request->news ;
            $news->disp_order = $request->disp_order;

            if($news->save()) {
                $request->session()->flash("Success","News has bas been added");
                return redirect()->route('admin.news.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the news");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.news.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.news.index'));
        }

        $news = News::find($id);

        return view('admin.news.edit')->with([
            'news'=>$news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.news.index'));
        }
    
        request()->validate([
            'news' => ['required','string'],
            
        ]);             

        try {
            
            $news = News::find($id);
            $news->news  = $request->news ;
            $news->disp_order = $request->disp_order;

            if($news->save()) {
                $request->session()->flash("Success","News has bas been updated");
                return redirect()->route('admin.news.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the news");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.news.edit',$news->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.news.index'));
        }

        $news = News::find($id);
        $news->delete();

        return redirect()->route('admin.news.index');
    }


    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.news.index'));
        }

        try {
            $news = News::find($request->id);
            $news->status = $request->status;
            if($news->save()) {
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
