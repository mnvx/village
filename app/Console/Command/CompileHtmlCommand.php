<?php

namespace App\Console\Command;

use Illuminate\Console\Command;

class CompileHtmlCommand extends Command
{
    protected $signature = 'geojson:compile-html';
    protected $description = 'Build index.html file';

    public function handle()
    {
        $geoJson = file_get_contents(config('app.geojson.prepared_file'));

        $html = view('index-html-template', [
            'geoJson' => $geoJson,
        ])->render();

        file_put_contents(public_path('index.html'), $html);
    }
}