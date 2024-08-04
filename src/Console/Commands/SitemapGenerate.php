<?php

namespace YourVendor\SitemapGenerator\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class SitemapGenerate extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate Sitemap';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        return App::call('krishanujadiya\SitemapGenerator\Http\Controllers\SitemapController@create');
    }
}
