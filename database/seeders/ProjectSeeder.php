<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use File;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::truncate();

        $projects = json_decode(File::get('database/data/projects.json'));

        foreach($projects as $project) {
            Project::create([
                'title' => $project->title,
                'description' => $project->description,
                'photo' => $project->photo,
                'url' => $project->url,
                'repository' => $project->repository
            ]);
        }
    }
}
