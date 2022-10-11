<?php

namespace App\Http\Controllers\Admin;

use App\Tutor;
use Exception;
use App\PdtCatg;
use App\Product;
use App\PdtSubCatg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('categories')->with('sub_categories')->get();
        return view('admin.products.index')->with([
            'products' => $products,
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
            return redirect(route('admin.products.index'));
        }
        $maincategory = PdtCatg::all();
        $tutors=Tutor::where('status',1)->get();
       
        return view('admin.products.new')->with([
            'maincategory' => $maincategory,
            'tutors'=>$tutors
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
            return redirect(route('admin.products.index'));
        }

        request()->validate([
            'catg_id' => ['required', 'string'],
            'product_code' => ['required', 'string','max:25', 'unique:products','alpha_dash'],
            'product_name' => ['required', 'string', 'max:255', 'unique:products'],
            'url_slug' => ['required', 'string', 'max:255', 'unique:products','alpha_dash'],
            'thump_image.*' => ['mimes:jpeg,jpg|max:2048'],
            'image1.*' => ['mimes:jpeg,jpg|max:2048'],
            'image2.*' => ['mimes:jpeg,jpg|max:2048'],
            'image3.*' => ['mimes:jpeg,jpg|max:2048'],
            'image4.*' => ['mimes:jpeg,jpg|max:2048'],
            'image5.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $product = new Product;
            $product->catg_id = $request->catg_id;
            $product->sub_catg_id = $request->sub_catg_id;
            $product->product_code = $request->product_code;
            $product->product_name = $request->product_name;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->product_value = $request->product_value;
            $product->tutor_id = $request->tutor_id;
            $product->start_date = $request->start_date;
            $product->end_date = $request->end_date;
            $product->url_slug = $request->url_slug;
            $product->keywords = $request->keywords;
            $product->disp_order = $request->disp_order;
            $product->thump_alt = '';
            $product->image1 = '';
            $product->image1_alt = '';
            $product->image2 = '';
            $product->image2_alt = '';
            $product->image3 = '';
            $product->image3_alt = '';
            $product->image4 = '';
            $product->image4_alt = '';
            $product->image5 = '';
            $product->image5_alt = '';

            if($product->save()) {
                if(request()->thump_image) {
                    //$fileName = "prod_".$product->id .'_t.'.request()->thump_image->getClientOriginalExtension();
                    $fileName = request()->thump_image->getClientOriginalName();
                    if($request->thump_image->storeAs('/',$fileName,'products')) {
                        $product->thump_image = $fileName;
                        $product->thump_alt = $request->thump_alt;
                        $product->save();
                    }
                }
                if(request()->image1) {
                    //$fileName = "prod_".$product->id .'_1.'.request()->image1->getClientOriginalExtension();
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'products')) {
                        $product->image1 = $fileName;
                        $product->image1_alt = $request->image1_alt;
                        $product->save();
                    }
                }
                if(request()->image2) {
                    //$fileName = "prod_".$product->id .'_2.'.request()->image2->getClientOriginalExtension();
                    $fileName = request()->image2->getClientOriginalName();
                    if($request->image2->storeAs('/',$fileName,'products')) {
                        $product->image2 = $fileName;
                        $product->image2_alt = $request->image2_alt;
                        $product->save();
                    }
                }
                if(request()->image3) {
                    //$fileName = "prod_".$product->id .'_3.'.request()->image3->getClientOriginalExtension();
                    $fileName = request()->image3->getClientOriginalName();
                    if($request->image3->storeAs('/',$fileName,'products')) {
                        $product->image3 = $fileName;
                        $product->image3_alt = $request->image3_alt;
                        $product->save();
                    }
                }
                if(request()->image4) {
                    //$fileName = "prod_".$product->id .'_4.'.request()->image4->getClientOriginalExtension();
                    $fileName = request()->image4->getClientOriginalName();
                    if($request->image4->storeAs('/',$fileName,'products')) {
                        $product->image4 = $fileName;
                        $product->image4_alt = $request->image4_alt;
                        $product->save();
                    }
                }
                if(request()->image5) {
                    //$fileName = "prod_".$product->id .'_5.'.request()->image5->getClientOriginalExtension();
                    $fileName = request()->image5->getClientOriginalName();
                    if($request->image5->storeAs('/',$fileName,'products')) {
                        $product->image5 = $fileName;
                        $product->image5_alt = $request->image5_alt;
                        $product->save();
                    }
                }



                $request->session()->flash("Success",$product->product_name. " has bas been added");
                return redirect()->route('admin.products.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the product");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.products.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.products.index'));
        }
        $maincategory = PdtCatg::all();
        $products = Product::find($id);
        $subcategory = PdtSubCatg::where("catg_id",$products->catg_id)->get();
        $tutors=Tutor::where('status',1)->get();


        return view('admin.products.edit')->with([
            'products'=>$products,
            'maincategory' => $maincategory,
            'subcategory' => $subcategory,
            'tutors'=>$tutors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.products.index'));
        }
    
        request()->validate([
            'catg_id' => ['required', 'string'],
            'product_code' => ['required', 'string', 'max:25'],
            'product_name' => ['required', 'string', 'max:255'],
            'url_slug' => ['required', 'string', 'max:255','alpha_dash'],
            'thump_image.*' => ['mimes:jpeg,jpg|max:2048'],
            'image1.*' => ['mimes:jpeg,jpg|max:2048'],
            'image2.*' => ['mimes:jpeg,jpg|max:2048'],
            'image3.*' => ['mimes:jpeg,jpg|max:2048'],
            'image4.*' => ['mimes:jpeg,jpg|max:2048'],
            'image5.*' => ['mimes:jpeg,jpg|max:2048'],
        ]);        

        try {
            
            $product = Product::find($id);
            $product->catg_id = $request->catg_id;
            $product->sub_catg_id = $request->sub_catg_id;
            $product->product_code = $request->product_code;
            $product->product_name = $request->product_name;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->product_value = $request->product_value;  
            $product->tutor_id = $request->tutor_id;
            $product->start_date = $request->start_date;
            $product->end_date = $request->end_date;          
            $product->url_slug = $request->url_slug;
            $product->keywords = $request->keywords;
            $product->disp_order = $request->disp_order;

            if($product->save()) {
                if(request()->thump_image) {
                    //$fileName = "prod_t_".$product->id .'.'.request()->thump_image->getClientOriginalExtension();
                    $fileName = request()->thump_image->getClientOriginalName();
                    if($request->thump_image->storeAs('/',$fileName,'products')) {
                        $product->thump_image = $fileName;
                        $product->thump_alt = $request->thump_alt;
                        $product->save();
                    }
                }
                if(request()->image1) {
                    //$fileName = "prod_1_".$product->id .'.'.request()->image1->getClientOriginalExtension();
                    $fileName = request()->image1->getClientOriginalName();
                    if($request->image1->storeAs('/',$fileName,'products')) {
                        $product->image1 = $fileName;
                        $product->image1_alt = $request->image1_alt;
                        $product->save();
                    }
                }
                if(request()->image2) {
                    //$fileName = "prod_2_".$product->id .'.'.request()->image2->getClientOriginalExtension();
                    $fileName = request()->image2->getClientOriginalName();
                    if($request->image2->storeAs('/',$fileName,'products')) {
                        $product->image2 = $fileName;
                        $product->image2_alt = $request->image2_alt;
                        $product->save();
                    }
                }
                if(request()->image3) {
                    //$fileName = "prod_3_".$product->id .'.'.request()->image3->getClientOriginalExtension();
                    $fileName = request()->image3->getClientOriginalName();
                    if($request->image3->storeAs('/',$fileName,'products')) {
                        $product->image3 = $fileName;
                        $product->image3_alt = $request->image3_alt;
                        $product->save();
                    }
                }
                if(request()->image4) {
                    //$fileName = "prod_4_".$product->id .'.'.request()->image4->getClientOriginalExtension();
                    $fileName = request()->image4->getClientOriginalName();
                    if($request->image4->storeAs('/',$fileName,'products')) {
                        $product->image4 = $fileName;
                        $product->image4_alt = $request->image4_alt;
                        $product->save();
                    }
                }
                if(request()->image5) {
                    //$fileName = "prod_5_".$product->id .'.'.request()->image5->getClientOriginalExtension();
                    $fileName = request()->image5->getClientOriginalName();
                    if($request->image5->storeAs('/',$fileName,'products')) {
                        $product->image5 = $fileName;
                        $product->image5_alt = $request->image5_alt;
                        $product->save();
                    }
                }

                $request->session()->flash("Success",$product->product_name. " has bas been updated");
                return redirect()->route('admin.products.index');
            }
            else {
                $request->session()->flash("Error","There was an error in updating the product");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.products.edit',$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.products.index'));
        }

        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.products.index');
    }


    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.products.index'));
        }

        try {
            $product = Product::find($request->id);
            $product->status = $request->status;
            if($product->save()) {
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
