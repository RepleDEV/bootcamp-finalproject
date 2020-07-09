@extends('template.master')

@section('content')
    
    <div class="container text-center my-5">
        <form action="{{route('login')}}" method="post">            
            <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" name="name" id="name" placeholder="" class="rounded border" style="outline:none;">
            </div>
            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="password" name="passwd" id="passwd" class="rounded border" style="outline:none;">
            </div>
            <button type="submit" class="btn btn-secondary">Log in</button>
        </form>
        <br>
        <p class="small">Belum mempunyai akun? Buat sekarang, klik <a href="/signup">disini</a></p>
    </div>

@endsection
