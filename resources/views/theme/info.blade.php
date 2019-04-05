@extends('layouts.app') 
@section('content')
<div class="container" style="font-family: verdana">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
    </div>
</div>
@endsection