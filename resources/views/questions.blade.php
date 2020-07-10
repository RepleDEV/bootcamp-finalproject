@extends('template.master')

@section('content')
    
    <div class="container text-center">
        <table class="table table-striped table-hover text-left">
            <tbody>
                <?php
                    if ($table_contents) {
                        foreach ($table_contents as $question) {
                            echo "<tr onclick='window.location.href+=\"/$question->id\"'>";
                            echo "<td><strong>$question->title</strong></td>";
                            echo "<td class=\"small\">Created: $question->created_at</td>";
                            echo "<td>Tags: $question->tags</td>";
                            echo "<td>Votes: $question->points</td>";
                            echo '</tr>';
                        }
                    }
                    ?>
            </tbody>
        </table>
        <a href="/questions/create" class="btn btn-primary">Tanya Pertanyaan</a>
    </div>

@endsection
