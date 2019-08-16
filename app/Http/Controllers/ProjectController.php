<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Tag;

class ProjectController extends Controller
{
    public function info(Request $request)
    {
        $project = Project::with('themes', 'screens.tags')
            ->where('id', $request->project_id)
            ->first();

        return view('project.info', compact('project'));
    }

    public function getProject(Request $request)
    {

        $project = Project::where('secret_key', $request->secret_key)->first();

        $theme_id = $request->theme_id ?? $project->default_theme_id;

        $tags = Tag::where('theme_id', $theme_id)->get();

        return compact('project', 'tags');
    }

    public function deleteProject(Request $request)
    {
        Project::where('id', $request->project_id)->delete();

        return redirect()->back();
    }
}
