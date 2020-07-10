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
    </div>

@endsection
