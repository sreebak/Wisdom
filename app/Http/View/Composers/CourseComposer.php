<?php
namespace App\Http\View\Composers;

use App\Product;
use Illuminate\View\View;

class CourseComposer
{
    public function compose(View $view){
        $view->with('courses',Product::where('status', '=', 1)->orderBy('disp_order')->get());
    }

}