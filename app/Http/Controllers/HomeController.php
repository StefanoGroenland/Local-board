<?php

namespace App\Http\Controllers;


use Illuminate\Support\Fluent;

class HomeController extends Controller
{
    public function index()
    {
        $projects = collect();
        if ($dirs = opendir('../../')) {
            while (false !== ($entry = readdir($dirs))) {
                if ($entry != '.' && $entry != '..') {
                    $projects->push(new Fluent([
                        'name' => $entry,
                        'url'  => $entry . env('APP_TLD')
                    ]));
                }
            }
        }
        closedir($dirs);

        try {
            $contents = file_get_contents('../.ignore-folders');
            $ignore = explode("\n", $contents);
            $ignore = collect($ignore);
        } catch (\Exception $e){
            throw new \ErrorException("Please add .ignore-folders to the root of this project.");
        }

        $projects = $projects->reject(function($project) use ($ignore){
            return collect($ignore)->contains($project->name);
        });

        return view('welcome', ['projects' => $projects->sortBy('name')]);
    }
}
