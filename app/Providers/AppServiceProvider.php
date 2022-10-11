<?php

namespace App\Providers;



use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\CourseComposer;
use App\Http\View\Composers\GeneralComposer;
use App\Http\View\Composers\CourseCategoryComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('website.*',GeneralComposer::class );
        View::composer('website.*',CourseComposer::class );
        View::composer('website.*',CourseCategoryComposer::class );
    }
}
