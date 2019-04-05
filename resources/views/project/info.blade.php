@extends('layouts.app') 
@section('content')
<div class="container" style="font-family: verdana">
    <div id="themeModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    CREATE THEME
                </div>

                <div class="modal-body">
                    <form class="form" action="/project/{{ $project->id }}/theme/create" method="POST" id="create_theme">
                        @csrf

                        <div class="form-group">
                            <label for="usr">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Theme Name">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">CANCEL</button>
                    <button type="submit" form="create_theme" class="btn btn-success btn-sm">CREATE</button>
                </div>
            </div>
        </div>
    </div>

    <div id="screenModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    CREATE SCREEN
                </div>

                <div class="modal-body">
                    <form class="form" action="/project/{{ $project->id }}/screen/create" method="POST" id="create_screen">
                        @csrf

                        <div class="form-group">
                            <label for="usr">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Screen Name">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">CANCEL</button>
                    <button type="submit" form="create_screen" class="btn btn-success btn-sm">CREATE</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Project</div>

                <div class="card-body">
                    <div style="font-weight: 500; font-size: 16px; color: black;">
                        {{ strtoupper($project->name) }}
                    </div>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">
                    <div class="float-left">
                        Themes ({{count($project->themes)}})
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#themeModal">Create Theme</button>
                    </div>
                </div>

                <div class="card-body">
                    @if(count($project->themes))
                    <div style="padding: 5px">
                        @foreach( $project->themes as $theme)
                        <div style="margin: 5px">
                            <div style="font-weight: 500; font-size: 16px; color: black;">
                                <a href="/project/{{ $project->id }}/theme/{{ $theme->id }}/info">
                                    <span>{{ $theme->name }}</span>
                                </a>
                                <span style="font-size: 12px">
                                    @if($project->default_theme_id == $theme->id) (default) @endif
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div>No themes yet.</div>
                    @endif
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">
                    <div class="float-left">
                        Screens ({{count($project->screens)}})
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#screenModal">Create Screen</button>
                    </div>
                </div>

                <div class="card-body">
                    @if(count($project->screens))
                    <div style="color: black">
                        @foreach( $project->screens as $screen)
                        <div style="margin: 5px; padding: 5px">
                            <div style="font-weight: 500; font-size: 16px; color: black;">
                                <a href="/project/{{ $project->id }}/screen/{{ $screen->id }}/info">
                                    <span>{{ $screen->name }}</span>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div>No screens yet.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection