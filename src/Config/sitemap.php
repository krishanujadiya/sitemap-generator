<?php

return [
    'changefreq' => env('SITEMAP_CHANGEFREQ', 'daily'), //always,hourly,daily,weekly,monthly,yearly,never.
    'priority' => env('SITEMAP_PRIORITY', '0.8'), //0.5 - 1.0 The default priority of a page is 0.5.
    'disk' => env('SITEMAP_DISK', 'public')
];
