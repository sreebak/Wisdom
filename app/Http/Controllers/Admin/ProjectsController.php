<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\PjxCatg;
use App\Project;
use Exception;
use Gate;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('categories')->get();
        return view('admin.projects.index')->with([
            'projects' => $projects,
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
            return redirect(route('admin.projects.index'));
        }
        $maincategory = PjxCatg::all();
       
        return view('admin.projects.new')->with([
            'maincategory' => $maincategory,
        ]);
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
            return redirect(route('admin.projects.index'));
        }

        request()->validate([
            'catg_id' => ['required', 'string'],
            'project_code' => ['required', 'string','max:25', 'unique:projects','alpha_dash'],
            'project_name' => ['required', 'string', 'max:255', 'unique:projects'],
            'url_slug' => ['required', 'string', 'max:255', 'unique:projects','alpha_dash'],
            'thump_image.*' => ['mimes:jpeg,jpg|max:2048'],
            'image1.*' => ['mimes:jpeg,jpg|max:2048'],
            'image2.*' => ['mimes:jpeg,jpg|max:2048'],
            'image3.*' => ['mimes:jpeg,jpg|max:2048'],
            'image4.*' => ['mimes:jpeg,jpg|max:2048'],
            'image5.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $project = new Project;
            $project->catg_id = $request->catg_id;
            $project->project_code = $request->project_code;
            $project->project_name = $request->project_name;
            $project->project_type = $request->project_type;
            $project->client_name = $request->client_name;
            $project->location = $request->location;
            $project->project_date1 = $request->project_date1;
            $project->project_date2 = $request->project_date2;
            $project->short_description = $request->short_description;
            $project->long_description = $request->long_description;
            $project->project_value = $request->project_value;
            $project->keywords = $request->keywords;
            $project->metatags = $request->metatags;
            $project->url_slug = $request->url_slug;
            $project->disp_order = $request->disp_order;
            $project->thump_image = '';
            $project->thump_alt = '';
            $project->image1 = '';
            $project->image1_alt = '';
            $project->image2 = '';
            $project->image2_alt = '';
            $project->image3 = '';
            $project->image3_alt = '';
            $project->image4 = '';
            $project->image4_alt = '';
            $project->image5 = '';
            $project->image5_alt = '';

            if($project->save()) {
                if(request()->thump_image) {
                    //$fileName = "prod_".$project->id .'_t.'.request()->thump_image->getClientOriginalExtension();
                    $fileName = request()->thump_image->getClientOriginalName();
                    if($request->thump_image->storeAs('/',$fileName,'projects')) {
                        $project->thump_image = $fileName;
                        $project->thump_alt = $request->thump_alt;
                        $project->save();
                    }
                }
                if(request()->image1) {
                    //$fileName = "prod_".$project->id .'_1.'.request()->image1->getClientOriginalExtension();
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'projects')) {
                        $project->image1 = $fileName;
                        $project->image1_alt = $request->image1_alt;
                        $project->save();
                    }
                }
                if(request()->image2) {
                    //$fileName = "prod_".$project->id .'_2.'.request()->image2->getClientOriginalExtension();
                    $fileName = request()->image2->getClientOriginalName();
                    if($request->image2->storeAs('/',$fileName,'projects')) {
                        $project->image2 = $fileName;
                        $project->image2_alt = $request->image2_alt;
                        $project->save();
                    }
                }
                if(request()->image3) {
                    //$fileName = "prod_".$project->id .'_3.'.request()->image3->getClientOriginalExtension();
                    $fileName = request()->image3->getClientOriginalName();
                    if($request->image3->storeAs('/',$fileName,'projects')) {
                        $project->image3 = $fileName;
                        $project->image3_alt = $request->image3_alt;
                        $project->save();
                    }
                }
                if(request()->image4) {
                    //$fileName = "prod_".$project->id .'_4.'.request()->image4->getClientOriginalExtension();
                    $fileName = request()->image4->getClientOriginalName();
                    if($request->image4->storeAs('/',$fileName,'projects')) {
                        $project->image4 = $fileName;
                        $project->image4_alt = $request->image4_alt;
                        $project->save();
                    }
                }
                if(request()->image5) {
                    //$fileName = "prod_".$project->id .'_5.'.request()->image5->getClientOriginalExtension();
                    $fileName = request()->image5->getClientOriginalName();
                    if($request->image5->storeAs('/',$fileName,'projects')) {
                        $project->image5 = $fileName;
                        $project->image5_alt = $request->image5_alt;
                        $project->save();
                    }
                }

                if(request()->genimages) {
                    $allowedfileExtension=['png','jpg','jpeg'];
                    $gfiles = $request->file('genimages');
                    foreach($gfiles as $file){
                        $fileName = $file->getClientOriginalName();
                        $extension = $file->getClientOriginalExtension();
                        $check=in_array($extension,$allowedfileExtension);
                        if($check) {
                            $subfolder = $project->id;
                            $file->storeAs('/' . $subfolder ,$fileName,'projects');
                        }
                    }
                }

                $request->session()->flash("Success",$project->project_name. " has bas been added");
                return redirect()->route('admin.projects.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the project");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.projects.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.projects.index'));
        }
        $maincategory = PjxCatg::all();
        $projects = Project::find($id);

        $genimages = Storage::disk('projects')->files($id);

        return view('admin.projects.edit')->with([
            'projects'=>$projects,
            'maincategory' => $maincategory,
            'genimgs' => $genimages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.projects.index'));
        }
    
        request()->validate([
            'catg_id' => ['required', 'string'],
            'project_code' => ['required', 'string','max:25','alpha_dash'],
            'project_name' => ['required', 'string', 'max:255'],
            'url_slug' => ['required', 'string', 'max:255','alpha_dash'],
            'thump_image.*' => ['mimes:jpeg,jpg|max:2048'],
            'image1.*' => ['mimes:jpeg,jpg|max:2048'],
            'image2.*' => ['mimes:jpeg,jpg|max:2048'],
            'image3.*' => ['mimes:jpeg,jpg|max:2048'],
            'image4.*' => ['mimes:jpeg,jpg|max:2048'],
            'image5.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $project = Project::find($id);
            $project->catg_id = $request->catg_id;
            $project->project_code = $request->project_code;
            $project->project_name = $request->project_name;
            $project->project_type = $request->project_type;
            $project->client_name = $request->client_name;
            $project->location = $request->location;
            $project->project_date1 = $request->project_date1;
            $project->project_date2 = $request->project_date2;
            $project->short_description = $request->short_description;
            $project->long_description = $request->long_description;
            $project->project_value = $request->project_value;
            $project->keywords = $request->keywords;
            $project->metatags = $request->metatags;
            $project->url_slug = $request->url_slug;
            $project->disp_order = $request->disp_order;

            if($project->save()) {
                if(request()->thump_image) {
                    //$fileName = "prod_".$project->id .'_t.'.request()->thump_image->getClientOriginalExtension();
                    $fileName = request()->thump_image->getClientOriginalName();
                    if($request->thump_image->storeAs('/',$fileName,'projects')) {
                        $project->thump_image = $fileName;
                        $project->thump_alt = $request->thump_alt;
                        $project->save();
                    }
                }
                if(request()->image1) {
                    //$fileName = "prod_".$project->id .'_1.'.request()->image1->getClientOriginalExtension();
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'projects')) {
                        $project->image1 = $fileName;
                        $project->image1_alt = $request->image1_alt;
                        $project->save();
                    }
                }
                if(request()->image2) {
                    //$fileName = "prod_".$project->id .'_2.'.request()->image2->getClientOriginalExtension();
                    $fileName = request()->image2->getClientOriginalName();
                    if($request->image2->storeAs('/',$fileName,'projects')) {
                        $project->image2 = $fileName;
                        $project->image2_alt = $request->image2_alt;
                        $project->save();
                    }
                }
                if(request()->image3) {
                    //$fileName = "prod_".$project->id .'_3.'.request()->image3->getClientOriginalExtension();
                    $fileName = request()->image3->getClientOriginalName();
                    if($request->image3->storeAs('/',$fileName,'projects')) {
                        $project->image3 = $fileName;
                        $project->image3_alt = $request->image3_alt;
                        $project->save();
                    }
                }
                if(request()->image4) {
                    //$fileName = "prod_".$project->id .'_4.'.request()->image4->getClientOriginalExtension();
                    $fileName = request()->image4->getClientOriginalName();
                    if($request->image4->storeAs('/',$fileName,'projects')) {
                        $project->image4 = $fileName;
                        $project->image4_alt = $request->image4_alt;
                        $project->save();
                    }
                }
                if(request()->image5) {
                    //$fileName = "prod_".$project->id .'_5.'.request()->image5->getClientOriginalExtension();
                    $fileName = request()->image5->getClientOriginalName();
                    if($request->image5->storeAs('/',$fileName,'projects')) {
                        $project->image5 = $fileName;
                        $project->image5_alt = $request->image5_alt;
                        $project->save();
                    }
                }

                if(request()->genimages) {
                    $allowedfileExtension=['png','jpg','jpeg'];
                    $gfiles = $request->file('genimages');
                    foreach($gfiles as $file){
                        $fileName = $file->getClientOriginalName();
                        $extension = $file->getClientOriginalExtension();
                        $check=in_array($extension,$allowedfileExtension);
                        if($check) {
                            $subfolder = $project->id;
                            $file->storeAs('/' . $subfolder ,$fileName,'projects');
                        }
                    }
                }
                
                $request->session()->flash("Success",$project->project_name. " has bas been updated");
                return redirect()->route('admin.projects.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the project");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.projects.edit',$project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.projects.index'));
        }

        $project = Project::find($id);
        if($project->delete()) {
            //Delete general image folder
            Storage::disk('projects')->deleteDirectory($id);
        }

        return redirect()->route('admin.projects.index');
    }


    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.projects.index'));
        }

        try {
            $project = Project::find($request->id);
            $project->status = $request->status;
            if($project->save()) {
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
