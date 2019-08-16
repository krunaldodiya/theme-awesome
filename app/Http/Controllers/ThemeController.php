<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Theme;
use App\Project;
use App\Screen;
use App\Tag;
use Carbon\Carbon;

class ThemeController extends Controller
{
    public function toggleDefault(Request $request)
    {
        Project::where('id', $request->project_id)->update(['default_theme_id' => $request->theme_id]);

        return redirect()->back();
    }

    public function info(Request $request)
    {
        $theme = Theme::with('project', 'tags')->where('id', $request->theme_id)->first();

        return view('theme.info', compact('theme'));
    }

    public function createTheme(Request $request)
    {
        $exits = Theme::where([
            'project_id' => $request->project_id,
            'name' => $request->name
        ])->count();

        if ($exits) {
            return redirect()->back()->withErrors(['exists' => 'Theme name must be unique']);
        }

        $theme = Theme::create([
            'project_id' => $request->project_id,
            'name' => $request->name
        ]);

        $tags = Tag::where('theme_id', $theme->project->default_theme_id)->get();

        $data = $tags->map(function ($tag) use ($theme) {
            return [
                'project_id' => $tag->project_id,
                'theme_id' => $theme->id,
                'screen_id' => $tag->screen_id,
                'type' => $tag->type,
                'key' => $tag->key,
                'value' => $tag->value,
                'description' => $tag->description,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        });

        Tag::insert($data->toArray());

        return redirect()->back();
    }

    public function deleteTheme(Request $request)
    {
        Theme::where('id', $request->theme_id)->delete();

        return redirect()->back();
    }
}
