<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Fluent;

Route::get('/', function () {
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
});
