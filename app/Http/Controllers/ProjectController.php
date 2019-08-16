<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Screen;
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
        $project = Project::where('secret_key', $request->secret_key)->firstOrFail();

        $theme_id = $request->theme_id ?? $project->default_theme_id;

        $screens = Screen::with(['tags' => function ($query) use ($theme_id) {
            return $query->where('theme_id', $theme_id);
        }])->where('project_id', $project->id)->get();

        return compact('screens');
    }

    public function deleteProject(Request $request)
    {
        Project::where('id', $request->project_id)->delete();

        return redirect()->back();
    }
}
