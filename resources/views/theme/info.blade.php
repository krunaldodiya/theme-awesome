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

                    @if($theme->project->default_theme_id != $theme->id)
                    <div class="float-right">
                        <a href="/project/{{$theme->project->id}}/theme/{{$theme->id}}/default" class="btn btn-sm btn-primary">Make Default</a>
                    </div>
                    @else
                    <div class="float-right">
                        <a href="#" class="btn btn-sm btn-primary disabled">Default</a>
                    </div>
                    @endif
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
                        Screen wise tags
                    </div>
                </div>

                <div class="card-body" style="padding: 0px">
                    <div class="float-left" style="width: 14%; border-right: 1px solid #ddd">
                        <ul class="nav flex-column">
                            @foreach ($theme->project->screens as $screen)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->screen_id == $screen->id ? " disabled " : " " }}" href="?screen_id={{$screen->id}}">{{$screen->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="float-right text-left" style="width: 85%; padding: 5px">
                        @if(request()->screen_id)
                        <ul class="nav flex-column">
                            @foreach ($tags as $tag)
                            <li class="nav-item">
                                <a class="nav-link active" href="?screen_id={{$tag->id}}">{{$tag->key}}</a>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <div>
                            select a screen to edit
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection