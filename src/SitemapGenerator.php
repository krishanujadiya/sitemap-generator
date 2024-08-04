<?php

namespace krishanujadiya\SitemapGenerator;

use SimpleXMLElement;
use DOMDocument;
use Illuminate\Support\Facades\Storage;

class SitemapGenerator
{
    public static function create(array $urls)
    {
        $xml = new SimpleXMLElement('<urlset/>');
        $xml->addAttribute("xmlns", "http://www.sitemaps.org/schemas/sitemap/0.9");
        $xml->addAttribute("xmlns:xhtml", "http://www.w3.org/1999/xhtml");

        $changefreq = config('sitemap.changefreq', 'daily');
        $priority = config('sitemap.priority', '0.8');
        $disk = config('sitemap.disk', 'public');

        foreach ($urls as $urlData) {
            $url = $xml->addChild('url');
            $url->addChild('loc', $urlData['url']);
            $url->addChild('lastmod', $urlData['lastmod']);
            $url->addChild('changefreq', $changefreq);
            $url->addChild('priority', $priority);
        }

        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->loadXML($xml->asXML());
        $dom->encoding = 'UTF-8';
        $dom->formatOutput = true;

        Storage::disk($disk)->put('sitemap.xml', $dom->saveXML());
    }
}
