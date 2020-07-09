@extends('template.master')

@section('content')

    <div class="container text-center">
        <h1>Pertanyaan Terbaru</h1>
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
                    if ($questions) {
                        foreach ($questions as $question) {
                            echo '<tr>';
                            echo "<td>$question->content</td>";
                            echo "<td>$question->created_at</td>";
                            echo "<td>$question->tags</td>";
                            echo "<td>$question->points</td>";
                            echo '</tr>';
                        }
                    }
                    ?>
            </tbody>
        </table>
        <a href="/questions" class="btn btn-primary">Lihat Pertanyaan-Pertanyaan</a>
    </div>

@endsection
