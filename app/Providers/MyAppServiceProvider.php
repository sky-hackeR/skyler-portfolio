<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\SiteInfo as Setting;
use App\Models\Social;
use App\Models\ContactInfo;

use Log;

class MyAppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('pageGlobalData', $this->pageGlobalData());
        });
    }

    public function pageGlobalData(){
        $setting = Setting::first();
        $socials = Social::all();
        $address = ContactInfo::first();
            

        $data = new \stdClass();
        $data->setting = $setting;
        $data->socials = $socials;
        $data->address = $address;

        return $data;
    }
}