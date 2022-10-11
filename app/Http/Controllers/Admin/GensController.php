<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Gen;
use Exception;
use Gate;

class GensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gen  $gen
     * @return \Illuminate\Http\Response
     */
    public function show(Gen $gen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gen  $gen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            if(Gate::denies('edit-data')) {
                return redirect(route('admin.gens.index'));
            }
            $gens = Gen::find($id);
            if($gens) {
                return view('admin.gens.edit')->with([
                    "gens" => $gens
                ]);
            }
            else {
                return view('admin.notfound');
            }
        }
        catch (Exception $ex) {

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
            return redirect(route('admin.gens.index'));
        }
    
        request()->validate([
            'webtitle' => ['required', 'string'],
        ]);        

        try {
            
            $gen = Gen::find($id);
            $gen->webtitle = $request->webtitle;
            $gen->description  = $request->description;
            $gen->metatags  = $request->metatags;
            $gen->google_analy  = $request->google_analy;
            $gen->google_map  = $request->google_map;
            $gen->keywords = $request->keywords;
            $gen->phone1 = $request->phone1;
            $gen->phone2 = $request->phone2;
            $gen->email1 = $request->email1;
            $gen->email2 = $request->email2;
            $gen->website = $request->website;
            $gen->address = $request->address;
            $gen->facebook = $request->facebook;
            $gen->twitter = $request->twitter;
            $gen->linkedin = $request->linkedin;
            $gen->youtube = $request->youtube;
            $gen->google = $request->google;


            if($gen->save()) {
                $request->session()->flash("Success",$gen->webtitle. " has bas been updated");
                return redirect()->route('admin.general.edit',1);
            }
            else {
                $request->session()->flash("Error","There was an error in updating the gen");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.general.edit',1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gen  $gen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
