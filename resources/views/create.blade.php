@extends('template.master')

@section('content')
    
    <div class="container">
        <form action="/questions" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" value="{{$old_title ?? ''}}">
            </div>
            <div class="form-group">
                <textarea name="content" id="content" cols="155" rows="14">{{$old_content ?? ''}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
