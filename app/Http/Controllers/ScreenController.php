<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Screen;
use App\Project;
use App\Tag;
use App\Theme;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ScreenController extends Controller
{
    public function info(Request $request)
    {
        $project = Project::where('id', $request->project_id)->first();
        $screen = Screen::where('id', $request->screen_id)->first();
        $tags = Tag::where([
            'project_id' => $request->project_id,
            'screen_id' => $request->screen_id,
            'theme_id' => $project->default_theme_id
        ])
            ->get();

        return view('screen.info', compact('project', 'screen', 'tags'));
    }

    public function createScreen(Request $request)
    {
        $key = Str::slug($request->name, '_');

        $exits = Screen::where(['project_id' => $request->project_id, 'key' => $key])->count();

        if ($exits) {
            return redirect()->back()->withErrors(['exists' => 'Screen key must be unique']);
        }

        Screen::create(['project_id' => $request->project_id, 'key' => $key, 'name' => $request->name]);

        return redirect()->back();
    }

    public function deleteScreen(Request $request)
    {
        Screen::where('id', $request->screen_id)->delete();

        return redirect()->back();
    }
}
