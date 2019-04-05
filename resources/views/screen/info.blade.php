@extends('layouts.app') 
@section('content')
<div class="container" style="font-family: verdana">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">
                    <div class="float-left">
                        Screen
                    </div>
                </div>

                <div class="card-body">
                    <div style="font-weight: 500; font-size: 16px; color: black;">
                        {{ strtoupper($screen->project->name) }} > {{ $screen->name }}
                    </div>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">
                    <div class="float-left">
                        Tags ({{count($screen->tags)}})
                    </div>
                    <div class="float-right">
                        <a href="/project/{{$screen->project->id}}/screen/{{$screen->id}}/tag/create" class="btn btn-sm btn-primary">Create tag</a>
                    </div>
                </div>

                <div class="card-body">
                    @if(count($screen->tags))
                    <div style="color: black">
                        @foreach( $screen->tags as $tag)
                        <div style="margin: 5px; padding: 5px">
                            <div style="font-weight: 500; font-size: 16px; color: black;">
                                <span>{{ $tag->name }}</span>
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