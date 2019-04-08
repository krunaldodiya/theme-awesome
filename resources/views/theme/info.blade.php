@extends('layouts.app') 
@section('content')
<div class="container" style="font-family: verdana">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header">
                    <div class="float-left">
                        Theme
                    </div>

                    <div class="float-right">
                        <div>
                            <a href="#" class="btn btn-sm btn-success">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a> @if($theme->project->default_theme_id !=
                            $theme->id)
                            <a href="/project/{{$theme->project->id}}/theme/{{$theme->id}}/default" class="btn btn-sm btn-primary">Make Default</a>                            @endif @if($theme->project->default_theme_id == $theme->id)
                            <a href="#" class="btn btn-sm btn-primary disabled">Default</a> @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div style="font-weight: 500; font-size: 16px; color: black;">
                        <a href="/project/{{$theme->project->id}}/info">{{ strtoupper($theme->project->name) }}</a>
                        <span>&#x203A;</span>
                        <span>{{ $theme->name }}</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header">
                    <div class="float-left">
                        Screen wise Tags
                    </div>
                </div>

                <div class="card-body" style="padding: 0px">
                    <div class="float-left" style="width: 14%; border-right: 1px solid #ddd">
                        <ul class="nav flex-column">
                            @foreach ($theme->project->screens as $screen)
                            <li class="nav-item" style="border-bottom: 1px solid #ddd">
                                <a class="nav-link {{ request()->screen_id == $screen->id ? " disabled " : " " }}" href="?screen_id={{$screen->id}}">{{$screen->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="float-right text-left" style="width: 85%; padding: 5px">
                        @if(request()->screen_id)
                        <div style="color: #000">
                            @foreach ($theme->tags as $tag)
                            <div>
                                @if($tag->screen_id == request()->screen_id)
                                <form action="/project/{{$tag->project_id}}/screen/{{$tag->screen_id}}/tag/update" class="form-inline" method="POST" style="margin: 5px">
                                    @csrf
                                    <div class="form-group" style="margin: 2px">
                                        <input type="hidden" name="tag_id" value="{{$tag->id}}">
                                        <input type="hidden" name="theme_id" value="{{$theme->id}}">
                                        <input type="hidden" name="project_id" value="{{$theme->project->id}}">
                                        <input type="hidden" name="type" value="{{$tag->type}}">
                                        <input type="hidden" name="key" value="{{$tag->key}}"> @if($tag->type == "MaterialColor")
                                        <input type="text" name="value" class="form-control" value="{{hello($tag->value)}}">                                        @else
                                        <input type="text" name="value" class="form-control" value="{{$tag->value}}"> @endif
                                    </div>

                                    <div class="form-group" style="margin: 2px">
                                        <button class="btn btn-primary btn-md" type="submit">CHANGE</button>

                                        <div>
                                            @if($tag->type == "MaterialColor")
                                            <div style="width: 35px; height: 35px; background: {{hello($tag->value)}}; margin-left: 8px; border-radius: 5px"></div>
                                            @endif
                                        </div>

                                        <button class="btn btn-primary btn-md disabled ml-2" style="width: 120px;" type="button">{{$tag->type}}</button>
                                        <button class="btn btn-primary btn-md disabled ml-2" type="button">{{$tag->key}}</button>
                                    </div>
                                </form>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div>
                            Select a screen to edit tags
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection