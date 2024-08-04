<?php

namespace krishanujadiya\SitemapGenerator\Http\Controllers;

use Illuminate\Routing\Controller;
use YourVendor\SitemapGenerator\SitemapGenerator;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function create(Request $request)
    {
        $urls = $request->input('urls', [
            ['url' => 'https://example.com/page1', 'lastmod' => '2023-01-01'],
            ['url' => 'https://example.com/page2', 'lastmod' => '2023-02-01']
        ]);

        SitemapGenerator::create($urls);

        return response()->json(['message' => 'Sitemap generated successfully']);
    }
}
