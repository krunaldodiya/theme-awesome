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

                    <div class="float-right">
                        <div>
                            <a href="#" class="btn btn-sm btn-success">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </div>
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
                        <a href="/project/{{$project->id}}/screen/{{$screen->id}}/tag/create" class="btn btn-sm btn-primary">Create tag</a>
                    </div>
                </div>

                <div class="card-body">
                    @if(count($tags))
                    <div style="color: black">
                        @foreach( $tags as $tag)
                        <div class="clearfix">
                            <div class="float-left">
                                <div style="margin: 5px; padding: 5px">
                                    <div style="font-weight: 500; font-size: 16px; color: black;">
                                        <span>{{ $tag->key }}</span>
                                    </div>

                                    <div style="font-weight: normal; font-size: 12px; color: gray;">
                                        <span>{{ $tag->description }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <form method="POST" action="/tags/delete">
                                    @csrf

                                    <input type="hidden" name="tag_key" value="{{$tag->key}}">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
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