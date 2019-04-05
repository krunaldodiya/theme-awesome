<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Theme;
use App\Project;

class ThemeController extends Controller
{
    public function toggleDefault(Request $request)
    {
        Project::where('id', $request->project_id)->update(['default_theme_id' => $request->theme_id]);
        
        return redirect()->back();
    }
    
    public function info(Request $request)
    {
        $theme = Theme::with('project')->where('id', $request->theme_id)->first();

        return view('theme.info', compact('theme'));
    }

    public function createTheme(Request $request)
    {
        $theme = Theme::create(['project_id' => $request->project_id, 'name' => $request->name]);

        if ($theme->project->default_theme_id == null) {
            $theme->project->update(['default_theme_id' => $theme->id]);
        }

        return redirect()->back();
    }
}
