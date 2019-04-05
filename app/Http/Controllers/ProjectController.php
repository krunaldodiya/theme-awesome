<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

class ProjectController extends Controller
{
    public function info(Request $request)
    {
        $project = Project::with('themes', 'screens.tags')->where('id', $request->project_id)->first();

        return view('project.info', compact('project'));
    }

    public function getProject(Request $request)
    {
        $project = Project::with('themes', 'screens.tags')->where('secret_key', $request->secret_key)->first();

        return compact('project');
    }
}
