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
                </div>

                <div class="card-body">
                    <div style="font-weight: 500; font-size: 16px; color: black;">
                        {{ strtoupper($theme->project->name) }} > {{ $theme->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection