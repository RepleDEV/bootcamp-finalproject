@extends('template.master')

@section('content')
    
    <div class="container text-center">
        <table class="table table-striped table-hover text-left">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Created At</th>
                    <th>Tags</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($table_contents) {
                        foreach ($table_contents as $question) {
                            echo '<tr>';
                            echo "<td>$question->title</td>";
                            echo "<td>$question->created_at</td>";
                            echo "<td>$question->tags</td>";
                            echo "<td>$question->points</td>";
                            echo '</tr>';
                        }
                    }
                    ?>
            </tbody>
        </table>
        <a href="/questions/create" class="btn btn-primary">Tanya Pertanyaan</a>
    </div>

@endsection
