<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// change to your settings model path below:
use App\Models\Setting;
use View;

class SiteSettingsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * Provides site settings to all views and controllers
     * Need to add to config/app.php in the Application Service Providers section:
     * App\Providers\SiteSettingsServiceProvider::class,
     *
     * @author Sabrina Markon, PHPSiteScripts.com 2017
     * @return void
     */
    public function boot()
    {
        // change to your settings model name below (instead of "Setting" if yours is different)
        $settings = Setting::pluck('setting', 'name');
        // provides site settings to all views:
        // if we need to use all settings variables ie. passing just $settings in parameter
        // instead of individual variables like $sitename, $domain, etc.
        View::share('settings', $settings);
        // provides site settings to all controllers:
        config()->set('settings', $settings);
        foreach ($settings as $key => $val) {
            // provides individual site settings variables to all views:
            View::share( $key, $val );
            // provides individual site settings variables to all controllers:
            config()->set($key, $val);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
