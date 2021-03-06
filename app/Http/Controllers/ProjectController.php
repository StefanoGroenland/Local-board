<?php

namespace App\Http\Controllers;


use Illuminate\Support\Fluent;

class ProjectController extends Controller
{
    protected $projects;

    public function index()
    {
        $this->projects = collect();

        $this->pushProjectsFrom($this->folders());

        $this->rejectIgnored();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $this->projects
            ], 200);
        }

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
            throw new \ErrorException("Something went wrong loading the folders from our config.");
        }
    }

    /**
     * @return array
     */
    protected function folders(): array
    {
        $folders = config('folders.read');

        return $folders;
    }

    /**
     * @throws \ErrorException
     */
    protected function rejectIgnored(): void
    {
        try {
            $ignore = collect(config('folders.ignore'));
        } catch (\Exception $e) {
            throw new \ErrorException("Please add .ignore-folders to the root of this project.");
        }

        $this->projects = $this->projects->reject(function ($project) use ($ignore) {
            return collect($ignore)->contains($project->name);
        });
    }
}
