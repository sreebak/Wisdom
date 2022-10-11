<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\SerCatg;
use App\SerSubCatg;
use App\Service;
use Exception;
use Gate;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::with('categories')->with('sub_categories')->get();
        return view('admin.services.index')->with([
            'services' => $services,
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
            return redirect(route('admin.services.index'));
        }
        $maincategory = SerCatg::all();
       
        return view('admin.services.new')->with([
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
            return redirect(route('admin.services.index'));
        }

        request()->validate([
            'catg_id' => ['required', 'string'],
            'sub_catg_id' => ['required', 'string'],
            'service_code' => ['required', 'string','max:25', 'unique:services','alpha_dash'],
            'service_name' => ['required', 'string', 'max:255', 'unique:services'],
            'url_slug' => ['required', 'string', 'max:255', 'unique:services','alpha_dash'],
            'thump_image.*' => ['mimes:jpeg,jpg|max:2048'],
            'image1.*' => ['mimes:jpeg,jpg|max:2048'],
            'image2.*' => ['mimes:jpeg,jpg|max:2048'],
            'image3.*' => ['mimes:jpeg,jpg|max:2048'],
            'image4.*' => ['mimes:jpeg,jpg|max:2048'],
            'image5.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $service = new Service;
            $service->catg_id = $request->catg_id;
            $service->sub_catg_id = $request->sub_catg_id;
            $service->service_code = $request->service_code;
            $service->service_name = $request->service_name;
            $service->short_description = $request->short_description;
            $service->long_description = $request->long_description;
            $service->service_value = $request->service_value;            
            $service->url_slug = $request->url_slug;
            $service->keywords = $request->keywords;
            $service->metatags = $request->metatags;
            $service->disp_order = $request->disp_order;
            $service->thump_alt = '';
            $service->image1 = '';
            $service->image1_alt = '';
            $service->image2 = '';
            $service->image2_alt = '';
            $service->image3 = '';
            $service->image3_alt = '';
            $service->image4 = '';
            $service->image4_alt = '';
            $service->image5 = '';
            $service->image5_alt = '';

            if($service->save()) {
                if(request()->thump_image) {
                    //$fileName = "prod_".$service->id .'_t.'.request()->thump_image->getClientOriginalExtension();
                    $fileName = request()->thump_image->getClientOriginalName();
                    if($request->thump_image->storeAs('/',$fileName,'services')) {
                        $service->thump_image = $fileName;
                        $service->thump_alt = $request->thump_alt;
                        $service->save();
                    }
                }
                if(request()->image1) {
                    //$fileName = "prod_".$service->id .'_1.'.request()->image1->getClientOriginalExtension();
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'services')) {
                        $service->image1 = $fileName;
                        $service->image1_alt = $request->image1_alt;
                        $service->save();
                    }
                }
                if(request()->image2) {
                    //$fileName = "prod_".$service->id .'_2.'.request()->image2->getClientOriginalExtension();
                    $fileName = request()->image2->getClientOriginalName();
                    if($request->image2->storeAs('/',$fileName,'services')) {
                        $service->image2 = $fileName;
                        $service->image2_alt = $request->image2_alt;
                        $service->save();
                    }
                }
                if(request()->image3) {
                    //$fileName = "prod_".$service->id .'_3.'.request()->image3->getClientOriginalExtension();
                    $fileName = request()->image3->getClientOriginalName();
                    if($request->image3->storeAs('/',$fileName,'services')) {
                        $service->image3 = $fileName;
                        $service->image3_alt = $request->image3_alt;
                        $service->save();
                    }
                }
                if(request()->image4) {
                    //$fileName = "prod_".$service->id .'_4.'.request()->image4->getClientOriginalExtension();
                    $fileName = request()->image4->getClientOriginalName();
                    if($request->image4->storeAs('/',$fileName,'services')) {
                        $service->image4 = $fileName;
                        $service->image4_alt = $request->image4_alt;
                        $service->save();
                    }
                }
                if(request()->image5) {
                    //$fileName = "prod_".$service->id .'_5.'.request()->image5->getClientOriginalExtension();
                    $fileName = request()->image5->getClientOriginalName();
                    if($request->image5->storeAs('/',$fileName,'services')) {
                        $service->image5 = $fileName;
                        $service->image5_alt = $request->image5_alt;
                        $service->save();
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
                            $subfolder = $service->id;
                            $file->storeAs('/' . $subfolder ,$fileName,'services');
                        }
                    }
                }

                $request->session()->flash("Success",$service->service_name. " has bas been added");
                return redirect()->route('admin.services.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the service");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.services.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.services.index'));
        }
        $maincategory = SerCatg::all();
        $services = Service::find($id);
        $subcategory = SerSubCatg::where("catg_id",$services->catg_id)->get();
        
        $genimages = Storage::disk('services')->files($id);

        return view('admin.services.edit')->with([
            'services'=>$services,
            'maincategory' => $maincategory,
            'subcategory' => $subcategory,
            'genimgs' => $genimages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.services.index'));
        }
    
        request()->validate([
            'catg_id' => ['required', 'string'],
            'service_code' => ['required', 'string', 'max:25'],
            'service_name' => ['required', 'string', 'max:255'],
            'url_slug' => ['required', 'string', 'max:255','alpha_dash'],
            'thump_image.*' => ['mimes:jpeg,jpg|max:2048'],
            'image1.*' => ['mimes:jpeg,jpg|max:2048'],
            'image2.*' => ['mimes:jpeg,jpg|max:2048'],
            'image3.*' => ['mimes:jpeg,jpg|max:2048'],
            'image4.*' => ['mimes:jpeg,jpg|max:2048'],
            'image5.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $service = Service::find($id);
            $service->catg_id = $request->catg_id;
            $service->sub_catg_id = $request->sub_catg_id;
            $service->service_code = $request->service_code;
            $service->service_name = $request->service_name;
            $service->short_description = $request->short_description;
            $service->long_description = $request->long_description;
            $service->service_value = $request->service_value;             
            $service->url_slug = $request->url_slug;
            $service->keywords = $request->keywords;
            $service->metatags = $request->metatags;
            $service->disp_order = $request->disp_order;

            if($service->save()) {
                if(request()->thump_image) {
                    //$fileName = "prod_t_".$service->id .'.'.request()->thump_image->getClientOriginalExtension();
                    $fileName = request()->thump_image->getClientOriginalName();
                    if($request->thump_image->storeAs('/',$fileName,'services')) {
                        $service->thump_image = $fileName;
                        $service->thump_alt = $request->thump_alt;
                        $service->save();
                    }
                }
                if(request()->image1) {
                    //$fileName = "prod_1_".$service->id .'.'.request()->image1->getClientOriginalExtension();
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'services')) {
                        $service->image1 = $fileName;
                        $service->image1_alt = $request->image1_alt;
                        $service->save();
                    }
                }
                if(request()->image2) {
                    //$fileName = "prod_2_".$service->id .'.'.request()->image2->getClientOriginalExtension();
                    $fileName = request()->image2->getClientOriginalName();
                    if($request->image2->storeAs('/',$fileName,'services')) {
                        $service->image2 = $fileName;
                        $service->image2_alt = $request->image2_alt;
                        $service->save();
                    }
                }
                if(request()->image3) {
                    //$fileName = "prod_3_".$service->id .'.'.request()->image3->getClientOriginalExtension();
                    $fileName = request()->image3->getClientOriginalName();
                    if($request->image3->storeAs('/',$fileName,'services')) {
                        $service->image3 = $fileName;
                        $service->image3_alt = $request->image3_alt;
                        $service->save();
                    }
                }
                if(request()->image4) {
                    //$fileName = "prod_4_".$service->id .'.'.request()->image4->getClientOriginalExtension();
                    $fileName = request()->image4->getClientOriginalName();
                    if($request->image4->storeAs('/',$fileName,'services')) {
                        $service->image4 = $fileName;
                        $service->image4_alt = $request->image4_alt;
                        $service->save();
                    }
                }
                if(request()->image5) {
                    //$fileName = "prod_5_".$service->id .'.'.request()->image5->getClientOriginalExtension();
                    $fileName = request()->image5->getClientOriginalName();
                    if($request->image5->storeAs('/',$fileName,'services')) {
                        $service->image5 = $fileName;
                        $service->image5_alt = $request->image5_alt;
                        $service->save();
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
                            $subfolder = $service->id;
                            $file->storeAs('/' . $subfolder ,$fileName,'services');
                        }
                    }
                }

                $request->session()->flash("Success",$service->service_name. " has bas been updated");
                return redirect()->route('admin.services.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the service");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.services.edit',$service->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.services.index'));
        }

        $service = Service::find($id);
        if($service->delete()) {
            //Delete general image folder
            Storage::disk('services')->deleteDirectory($id);
        }

        return redirect()->route('admin.services.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.services.index'));
        }

        try {
            $service = Service::find($request->id);
            $service->status = $request->status;
            if($service->save()) {
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
