<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Resource;
use App\Models\Source;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ResourceService implements Resource
{
    public function getData(){
        $files = Storage::files('parsing/');
        $data = array();
        foreach($files as $key => $path){
            $data[$key] = json_decode(Storage::get($path),true);
        }

        Source::truncate();
        foreach($data as $source){
            foreach($source['news'] as $rows){
                Source::insert([
                    'title' => $rows['title'],
                    'url' =>$rows['link'],
                    'description' => $rows['description'],
                    'created_at' => Carbon::parse($rows['pubDate'])->format('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
