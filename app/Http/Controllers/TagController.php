<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Screen;
use App\Http\Requests\TagRequest;
use App\Theme;
use Carbon\Carbon;

class TagController extends Controller
{
    public function create(Request $request)
    {
        $screen = Screen::with('project')->where('id', $request->screen_id)->first();

        if ($screen->project->user_id != auth()->user()->id) {
            return redirect()->back();
        }

        return view('screen.create_tag', compact('screen'));
    }

    public function store(TagRequest $request)
    {
        $default_value = config('tag')[$request->type];

        $exits = Tag::where([
            'project_id' => $request->project_id,
            'screen_id' => $request->screen_id,
            'key' => $request->key
        ])->count();

        if ($exits) {
            return redirect()->back()->withErrors(['exists' => 'Tag key must be unique']);
        }

        $data = Theme::all()->map(function ($theme) use ($request, $default_value) {
            return [
                'project_id' => $request->project_id,
                'theme_id' => $theme->id,
                'screen_id' => $request->screen_id,
                'type' => $request->type,
                'key' => $request->key,
                'value' => $request->value ?? $default_value,
                'description' => $request->description,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        });

        Tag::insert($data->toArray());

        return redirect()->to("/project/$request->project_id/screen/$request->screen_id/info");
    }

    public function update(Request $request)
    {
        Tag::where('id', $request->tag_id)->update(['value' => $request->type == "MaterialColor" ? str_replace("#", "0xff", $request->value) : $request->value]);

        return redirect()->back();
    }

    public function deleteTag(Request $request)
    {
        Tag::where('key', $request->tag_key)->delete();

        return redirect()->back();
    }
}
