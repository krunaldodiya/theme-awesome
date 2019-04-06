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
        $exits = Tag::where(['project_id' => $request->project_id, 'key' => $request->key])->count();

        if ($exits) {
            return redirect()->back()->withErrors(['exists' => 'Tag key must be unique']);
        }

        $data = Theme::all()->map(function ($theme) use ($request) {
            return [
                'project_id' => $request->project_id,
                'theme_id' => $theme->id,
                'screen_id' => $request->screen_id,
                'type' => $request->type,
                'key' => $request->key,
                'value' => $request->value,
                'description' => $request->description,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        });

        Tag::insert($data->toArray());

        return redirect()->to("/project/$request->project_id/screen/$request->screen_id/info");
    }

    public function delete(Request $request)
    {
        return Tag::delete($request->tag_id);
    }
}
