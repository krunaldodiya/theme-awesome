<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Theme;
use App\Project;
use App\Tag;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    public function toggleDefault(Request $request)
    {
        Project::where('id', $request->project_id)->update(['default_theme_id' => $request->theme_id]);
        
        return redirect()->back();
    }
    
    public function info(Request $request)
    {
        $test = Tag::get();
        dd($test->toArray());

        $theme = Theme::with('project.screens', 'tags')->where('id', $request->theme_id)->first();

        return view('theme.info', compact('theme'));
    }

    public function createTheme(Request $request)
    {
        $exits = Theme::where(['project_id' => $request->project_id, 'name' => $request->name])->count();

        if ($exits) {
            return redirect()->back()->withErrors(['exists' => 'Theme name must be unique']);
        }

        $theme = Theme::create(['project_id' => $request->project_id, 'name' => $request->name]);

        $theme->tags()->attach(Tag::where('project_id', $request->project_id)->pluck('id'));

        if ($theme->project->default_theme_id == null) {
            $theme->project->update(['default_theme_id' => $theme->id]);
        }

        return redirect()->back();
    }
}
