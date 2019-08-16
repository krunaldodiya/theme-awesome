@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="container">
        @if($errors->has('exists'))
        <div class="alert alert-danger">
            {{ $errors->first('exists') }}
        </div>
        @endif

        <div class="content">
            <form class="form" action="/project/{{ $screen->project->id }}/screen/{{ $screen->id }}/tag/create"
                method="POST" id="create_tag">
                @csrf

                <input type="hidden" name="project_id" value="{{$screen->project->id}}">
                <input type="hidden" name="screen_id" value="{{$screen->id}}">

                <div class="form-group">
                    <label for="usr">Type:</label>
                    <select class="form-control" name="type" id="type">
                        <option value="String">String</option>
                        <option value="Number">Number</option>
                    </select>
                </div>

                <div class="form-group">
                    <div>
                        <label for="usr">Key:</label>
                        <input type="text" class="form-control" name="key" id="key" placeholder="Tag Identifier">
                    </div>

                    @if ($errors->has('key'))
                    <div class="alert alert-danger" style="margin-top: 5px">
                        <li>{{ $errors->first('key') }}</li>
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <div>
                        <label for="usr">Value:</label>
                        <input type="text" class="form-control" name="value" id="value" placeholder="Key Value">
                    </div>

                    @if ($errors->has('default'))
                    <div class="alert alert-danger" style="margin-top: 5px">
                        <li>{{ $errors->first('default') }}</li>
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <div>
                        <label for="usr">Description:</label>
                        <textarea class="form-control" name="description" id="description" rows="3"
                            placeholder="Description"></textarea>
                    </div>

                    @if ($errors->has('description'))
                    <div class="alert alert-danger" style="margin-top: 5px">
                        <li>{{ $errors->first('description') }}</li>
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <button class="btn btn-md btn-success" type="submit">CREATE</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
