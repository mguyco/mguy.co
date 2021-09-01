<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectTags;
use App\Models\Tag;

class ProjectController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $request->photo
        ]);

        $this->setProjectTags($project->id, $request->tags);

        return response()->json($this->find($project->id), 201);
    }

    public function delete($id)
    {
        Project::findOrFail($projectId)->delete();

        return response()->json(['message' => 'Project deleted successfully']);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'photo' => 'required|string'
        ]);

        $project = Project::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $request->photo
        ]);

        $this->setProjectTags($id, $request->tags);

        return $this->find($id);
    }

    public function index()
    {
        return response()->json(Project::all());
    }

    public function find($id)
    {
        return Project::findOrFail($id);
    }

    private function setProjectTags($projectId, $projectTags)
    {
        ProjectTags::where('project_id', $projectId)->delete();

        $tags = Tag::whereRaw("LOWER(name) IN ('" . implode("','", array_map('strtolower', $projectTags)) . "')")->get();

        foreach($tags as $tag)
        {
            // create record
            ProjectTags::create([
                'project_id' => $projectId,
                'tag_id' => $tag->id
            ]);
        }
    }
}