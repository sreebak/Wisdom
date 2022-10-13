<?php

namespace App\Http\Controllers\Admin;

use App\HomePageContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class HomePageContentController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gen  $gen
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        try {
            if(Gate::denies('edit-data')) {
                return redirect(route('admin.homepagecontent',1));
            }
            $content=HomePageContent::findOrFail($id);
            if($content) {
                return view('admin.homepagecontent.edit',compact('content'));
            }
            else {
                return view('admin.notfound');
            }
        }
        catch (\Exception $ex) {
            return redirect(route('admin.homepagecontent',1));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gen  $gen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.homepageContent',1));
        }
    
        request()->validate([
            'banner1_title1' => ['required', 'string'],
            'banner1_title2' => ['required', 'string'],
            'banner1_description' => ['required', 'string'],
            'school_count' => ['required', 'string'],
            'review_count' => ['required', 'string'],
            'note_count' => ['required', 'string'],
            'banner2_title' => ['required', 'string'],
            'banner2_description' => ['required', 'string'],
            'resources_title' => ['required', 'string'],
            'button_label' => ['required', 'string'],
            'resources_description' => ['required', 'string'],
            'google_description1' => ['required', 'string'],
            'google_description2' => ['required', 'string'],
            'homepage_image1.*' => ['mimes:jpeg,jpg|max:2048'],
            'homepage_image2.*' => ['mimes:jpeg,jpg|max:2048'],
            'homepage_image3.*' => ['mimes:jpeg,jpg|max:2048'],
            'homepage_image4.*' => ['mimes:jpeg,jpg|max:2048'],
           
        ]);        

        try {
            
            $content = HomePageContent::find($id);
            $content->banner1_title1 = $request->banner1_title1;
            $content->banner1_title2  = $request->banner1_title2;
            $content->banner1_description  = $request->banner1_description;
            $content->banner_title  = $request->banner_title;
            $content->banner_description  = $request->banner_description;
            $content->button_label  = $request->button_label;
            $content->school_count  = $request->school_count;
            $content->review_count  = $request->review_count;
            $content->note_count = $request->note_count;
            $content->banner2_title = $request->banner2_title;
            $content->banner2_description = $request->banner2_description;
            $content->resources_title = $request->resources_title;
            $content->resources_description = $request->resources_description;
            $content->google_description1 = $request->google_description1;
            $content->google_description2 = $request->google_description2;


            if($content->save()) {
                if(request()->homepage_image1) {
                   
                    $fileName = request()->homepage_image1->getClientOriginalName();
                 
                    //if($request->homepage_image1->move(public_path('storage/homepageImages'), $fileName)) {
                    if($request->homepage_image1->storeAs('/',$fileName,'homepageImages')) {
                        $content->homepage_image1 = $fileName;
                        
                        $content->save();
                    }
                }
                if(request()->homepage_image2) {
                    //$fileName = "content_".$content->id .'_2.'.request()->image2->getClientOriginalExtension();
                    $fileName = request()->homepage_image2->getClientOriginalName();
                    //if($request->homepage_image2->move(public_path('storage/homepageImages'), $fileName)) {
                    if($request->homepage_image2->storeAs('/',$fileName,'homepageImages')) {  
                        $content->homepage_image2 = $fileName;
                        
                        $content->save();
                    }
                }
                if(request()->homepage_image3) {
                    //$fileName = "content_".$content->id .'_3.'.request()->image3->getClientOriginalExtension();
                    $fileName = request()->homepage_image3->getClientOriginalName();
                    //if($request->homepage_image3->move(public_path('storage/homepageImages'), $fileName)) {
                    if($request->homepage_image3->storeAs('/',$fileName,'homepageImages')) {   
                        $content->homepage_image3 = $fileName;
                       
                        $content->save();
                    }
                }
                if(request()->homepage_image4) {
                    //$fileName = "content_".$content->id .'_4.'.request()->image4->getClientOriginalExtension();
                    $fileName = request()->homepage_image4->getClientOriginalName();
                    if($request->homepage_image4->storeAs('/',$fileName,'homepageImages')) {
                    //if($request->homepage_image4->move(public_path('storage/homepageImages'), $fileName)) {
                        $content->homepage_image4 = $fileName;
                        
                        $content->save();
                    }
                }
                $request->session()->flash("Success","Homepage contents has bas been updated");
                return redirect()->route('admin.homePageContent',1);
            }
            else {
                $request->session()->flash("Error","There was an error in updating the home page content");
            }
        }
        catch(\Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.homePageContent',1);
    }
}
