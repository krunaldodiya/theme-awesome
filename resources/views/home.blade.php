@extends('layouts.app') 
@section('content')
<div class="container" style="font-family: verdana">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header">Projects ({{auth()->user()->projects->count()}})</div>

                <div class="card-body">
                    @foreach(auth()->user()->projects as $project)
                    <div>
                        <a href="/project/{{ $project->id }}/info">
                            <div style="font-weight: 500; font-size: 16px; color: blue;">
                                {{ strtoupper($project->name) }}
                            </div>
                        </a>

                        <div style="margin-top: 5px; font-size: 12px">
                            <span style="margin-right: 5px; font-weight: 400; color: #000;">SECRET KEY</span>
                            <span style="font-weight: normal; padding: 2px 5px; border: 1px solid #ccc; color: #333;">
                                {{ $project->secret_key }}
                            </span>
                        </div>

                        <div style="margin-top: 10px">
                            {{ $project->description ?: "No description" }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection