<?php

namespace App\Http\Controllers;


use Illuminate\Support\Fluent;

class HomeController extends Controller
{
    protected $projects;

    public function index()
    {
        $this->projects = collect();

        $this->pushProjectsFrom($this->folders());

        try {
            $contents = file_get_contents('../.ignore-folders');
            $ignore = explode("\n", $contents);
            $ignore = collect($ignore);
        } catch (\Exception $e) {
            throw new \ErrorException("Please add .ignore-folders to the root of this project.");
        }

        $this->projects = $this->projects->reject(function ($project) use ($ignore) {
            return collect($ignore)->contains($project->name);
        });

        return view('welcome', ['projects' => $this->projects->sortBy('name')]);
    }

    /**
     * @param $folders
     *
     * @throws \ErrorException
     */
    protected function pushProjectsFrom($folders): void
    {
        try {
            foreach ($folders as $folder) {
                if ($dirs = opendir('../../' . $folder)) {
                    while (false !== ($entry = readdir($dirs))) {
                        if ($entry != '.' && $entry != '..') {
                            $this->projects->push(new Fluent([
                                'name' => $entry,
                                'url'  => $entry . env('APP_TLD')
                            ]));
                        }
                    }
                }
                closedir($dirs);
            }
        } catch (\Exception $e) {
            throw new \ErrorException("Please add .folders to the root of this project.");
        }
    }

    /**
     * @return array
     */
    protected function folders(): array
    {
        $contents = file_get_contents('../.folders');
        $folders = explode("\n", $contents);

        return $folders;
    }
}
