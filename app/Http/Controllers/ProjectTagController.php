<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectTag;

class ProjectTagController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'project_id' => 'required|int',
            'tag_id' => 'required|int'
        ]);

        $projectTag = ProjectTag::create([
            'project_id' => $request->projectId,
            'tag_id' => $request->tagId
        ]);

        return $projectTag->toArray();
    }

    public function delete($projectTagId)
    {
        ProjectTag::findOrFail($projectTagId)->delete();

        @http_response_code(204);
    }

    public function index()
    {
        return ProjectTag::all();
    }

    public function getTagsByProject($projectId)
    {
        return ProjectTag::where('project_id', $projectId)->get();
    }

    public function getProjectsByTag($tagId)
    {
        return ProjectTag::where('tag_id', $tagId)->get();
    }
}
