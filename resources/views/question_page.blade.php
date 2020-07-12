@extends('template.master')

@section('content')

    <div class="container text-center">
        <h1>{{$question->title}}</h1>
    <p class="small">Created at: {{$question->created_at}} | Updated at: {{$question->updated_at}} | Asked by: {{$question->user_created}}</p>
        <hr>
        <?php 
            echo $question->content;
            $tags = explode(",",$question->tags);
            foreach ($tags as $tag) {
                echo "<button class=\"btn btn-secondary mx-1\">$tag</button>";
            }
        ?>

        <br><br>
        
        <a href="/questions/{{$question->id}}/upvote" class="btn btn-primary">Upvote</a>
        <a href="/questions/{{$question->id}}/downvote" class="btn btn-danger">Downvote</a>
        <button class="btn btn-secondary">Votes: {{$question->points}}</button>

        <hr>
        <div class="container text-left">
            <h4 class="small">Jawab pertanyaan ini:</h4>
            <form action="/questions/{{$question->id}}" method="post">
                <input type="hidden" name="task" value="answer">
                @csrf
                <div class="form-group">
                    <textarea name="content" id="content">{{$old_content ?? '&lt;p&gt;This is some sample content.&lt;/p&gt;'}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <script>
                ClassicEditor.create(document.querySelector('#content')).then(e => console.log(e)).catch(err => console.log(err));
            </script>
        </div>
        <hr>
        <?php
            foreach($answers as $answer) {
                echo "<div class=\"container text-left\">";
                echo "<h3>Jawaban $answer->user_created:</h3>";
                echo "<hr>";
                echo "<p>$answer->content</p>";
                echo "</div>";
            }
        ?>
    </div>

@endsection
