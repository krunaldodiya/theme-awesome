<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Screen;
use App\Http\Requests\TagRequest;
use App\Theme;

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

        $tag = Tag::create($request->all());

        $tag->themes()->attach(Theme::where('project_id', $request->project_id)->pluck('id'));

        return redirect()->to("/project/$request->project_id/screen/$request->screen_id/info");
    }

    public function delete(Request $request)
    {
        return Tag::delete($request->tag_id);
    }
}
