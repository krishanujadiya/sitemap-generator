# Sitemap Generator

A Laravel package to generate sitemaps dynamically.

## Installation

You can install the package via Composer:

```bash
composer require krishanujadiya/sitemap-generator

Usage
Publish the configuration file:

php artisan vendor:publish --provider="krishanujadiya\\SitemapGenerator\\Providers\\SitemapServiceProvider"
Generate a sitemap by passing URLs from your controller:

use krishanujadiya\SitemapGenerator\SitemapGenerator;

class YourController extends Controller
{
    public function generateSitemap()
    {
        $urls = [
            ['url' => 'https://example.com/page1', 'lastmod' => '2023-01-01'],
            ['url' => 'https://example.com/page2', 'lastmod' => '2023-02-01']
        ];

        SitemapGenerator::create($urls);
    }
}
Example provided
Register a route to generate the sitemap:

In routes/web.php:

use krishanujadiya\SitemapGenerator\Http\Controllers\SitemapController;

Route::get('/generate-sitemap', [SitemapController::class, 'create']);
Generate the sitemap:

Access the /generate-sitemap URL and pass URLs as query parameters to generate the sitemap, which will be saved to the public disk.

Configuration
Edit the config/sitemap.php file to set changefreq and priority:

return [
    'changefreq' => env('SITEMAP_CHANGEFREQ', 'daily'),
    'priority' => env('SITEMAP_PRIORITY', '0.8'),
];
You can also set these variables in your .env file:

SITEMAP_CHANGEFREQ=daily
SITEMAP_PRIORITY=0.8
