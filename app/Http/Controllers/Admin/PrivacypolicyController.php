<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Privacypolicy;
use Exception;
use Gate;

class PrivacypolicyController extends Controller
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
     * @param  \App\Privacypolicy  $privacypolicy
     * @return \Illuminate\Http\Response
     */
    public function show(Privacypolicy $privacypolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Privacypolicy  $privacypolicy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            if(Gate::denies('edit-data')) {
                return redirect(route('admin.privacypolicy.index'));
            }
            $privacypolicy = Privacypolicy::find($id);
            if($privacypolicy) {
                return view('admin.privacypolicy.edit')->with([
                    "privacypolicy" => $privacypolicy
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
     * @param  \App\Privacypolicy  $privacypolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.privacypolicy.index'));
        }
    
        request()->validate([
            'policy' => ['required', 'string'],
        ]);        

        try {
            
            $privacypolicy = Privacypolicy::find($id);
            $privacypolicy->policy = $request->policy;
            
            if($privacypolicy->save()) {
                $request->session()->flash("Success","Privacy Policy has bas been updated");
                return redirect()->route('admin.privacypolicy.edit',1);
            }
            else {
                $request->session()->flash("Error","There was an error in updating the privacypolicy");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.privacypolicy.edit',1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Privacypolicy  $privacypolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
