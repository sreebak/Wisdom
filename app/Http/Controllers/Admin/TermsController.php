<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Term;
use Exception;
use Gate;

class TermsController extends Controller
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
     * @param  \App\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function show(Term $term)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            if(Gate::denies('edit-data')) {
                return redirect(route('admin.term.index'));
            }
            $term = Term::find($id);
            if($term) {
                return view('admin.term.edit')->with([
                    "term" => $term
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
     * @param  \App\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.term.index'));
        }
    
        request()->validate([
            'terms' => ['required', 'string'],
        ]);        

        try {
            
            $term = Term::find($id);
            $term->terms = $request->terms;
            
            if($term->save()) {
                $request->session()->flash("Success","Terms and Conditions has bas been updated");
                return redirect()->route('admin.terms.edit',1);
            }
            else {
                $request->session()->flash("Error","There was an error in updating the term");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.term.edit',1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
