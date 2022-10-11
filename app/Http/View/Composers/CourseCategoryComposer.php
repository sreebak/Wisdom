<?php
namespace App\Http\View\Composers;

use App\PdtCatg;
use Illuminate\View\View;

class CourseCategoryComposer
{
    public function compose(View $view){
        $view->with('courseCategories',PdtCatg::where('status', '=', 1)->orderBy('disp_order')->get());
    }

}