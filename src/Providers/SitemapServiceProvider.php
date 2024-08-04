<?php

namespace krishanujadiya\Providers\SitemapGenerator;

use Illuminate\Support\ServiceProvider;
use krishanujadiya\SitemapGenerator\Console\Commands\SitemapGenerate;

class SitemapServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish the configuration file
        $this->publishes([
            __DIR__.'/Config/sitemap.php' => config_path('sitemap.php'),
        ]);

        // Register the command
        if ($this->app->runningInConsole()) {
            $this->commands([
                SitemapGenerate::class,
            ]);
        }
    }

    public function register()
    {
        // Merge package configuration with application configuration
        $this->mergeConfigFrom(
            __DIR__.'/Config/sitemap.php', 'sitemap'
        );
    }
}
