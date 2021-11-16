<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectTag;
use File;

class ProjectTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectTag::truncate();

        $projectTags = json_decode(File::get('database/data/projectTags.json'));

        foreach($projectTags as $projectTag) {
            ProjectTag::create([
                'tag_id' => $projectTag->tag_id,
                'project_id' => $projectTag->project_id
            ]);
        }
    }
}
