<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Screen;

class ScreenController extends Controller
{
    public function createScreen(Request $request)
    {
        Screen::create(['project_id' => $request->project_id, 'name' => $request->name]);

        return redirect()->back();
    }
}
