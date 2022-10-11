<?php
namespace App\Http\View\Composers;

use App\Gen;
use Illuminate\View\View;

class GeneralComposer
{
    public function compose(View $view){
        $view->with('gens',Gen::findOrFail(1));
    }

}