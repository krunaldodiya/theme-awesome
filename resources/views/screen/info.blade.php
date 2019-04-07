@extends('layouts.app') 
@section('content')
<div class="container" style="font-family: verdana">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header">
                    <div class="float-left">
                        Screen
                    </div>
                </div>

                <div class="card-body">
                    <div style="font-weight: 500; font-size: 16px; color: black;">
                        <a href="/project/{{$project->id}}/info">{{ strtoupper($project->name) }}</a>
                        <span>&#x203A;</span>
                        <span>{{ $screen->name }}</span>
                    </div>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">
                    <div class="float-left">
                        Tags ({{count($tags)}})
                    </div>
                    <div class="float-right">
                        <a href="/project/{{$project->id}}/screen/{{$project['screen']['id']}}/tag/create" class="btn btn-sm btn-primary">Create tag</a>
                    </div>
                </div>

                <div class="card-body">
                    @if(count($tags))
                    <div style="color: black">
                        @foreach( $tags as $tag)
                        <div style="margin: 5px; padding: 5px">
                            <div style="font-weight: 500; font-size: 16px; color: black;">
                                <span>{{ $tag->key }}</span>
                            </div>

                            <div style="font-weight: normal; font-size: 12px; color: gray;">
                                <span>{{ $tag->description }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div>No tags yet.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection