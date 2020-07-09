@extends('template.master')

@section('content')
    
    <div class="container">
        <form action="/questions" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" value="{{$old_title ?? ''}}">
            </div>
            <div class="form-group">
                <textarea name="content" id="content">{{$old_content ?? '&lt;p&gt;This is some sample content.&lt;/p&gt;'}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <script>
            ClassicEditor.create(document.querySelector('#content')).then(e => console.log(e)).catch(err => console.log(err));
        </script>
    </div>

@endsection
