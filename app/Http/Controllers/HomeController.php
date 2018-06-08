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

        $ignore = collect([
            '.DS_Store',
            'CallMeBack',
            'overview'
        ]);

        $projects = $projects->reject(function($project) use ($ignore){
            return collect($ignore)->contains($project->name);
        });

        return view('welcome', ['projects' => $projects]);
    }
}
