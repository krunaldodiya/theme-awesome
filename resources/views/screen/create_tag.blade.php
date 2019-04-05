@extends('layouts.app') 
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="content">
            <form class="form" action="/project/{{ $screen->project->id }}/screen/{{ $screen->id }}/tag/create" method="POST" id="create_tag">
                @csrf

                <input type="hidden" name="project_id" value="{{$screen->project->id}}">

                <input type="hidden" name="screen_id" value="{{$screen->id}}">

                <div class="form-group">
                    <label for="usr">Type:</label>
                    <select class="form-control" name="type" id="type">
                        <option value="MaterialColor">MaterialColor</option>
                        <option value="Boolean">Boolean</option>
                        <option value="String">String</option>
                        <option value="Double">Double</option>
                        <option value="Integer">Integer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="usr">Key:</label>
                    <input type="text" class="form-control" name="key" id="key" placeholder="Tag Identifier">
                </div>

                <div class="form-group">
                    <label for="usr">Description:</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-md btn-success" type="submit">CREATE</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection