@extends('layouts.base')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container color_post">
            <h1>{{$posts->title}}</h1>
            <span><i class="bi bi-person-circle"></i> Dewa Kucing</span>
            <span><i class="bi bi-calendar"></i> {{$posts->created_at}}</span>
            <p>{{$posts->description}}</p>
            <a href="/posts/{{$posts->id}}/edit" class="btn btn-primary">Edit</a><br>
            <form action="{{ route('posts.destroy', $posts->id) }}" method="POST">
            @method('DELETE')
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $posts->id }}"> <br />
            <button type="submit" class="btn btn-danger" onclick="return confirm('Post akan dihapus')">Delete</button>
            </form><br>
            <a href="/posts">Back</a>
        </div>
    </div>
@endsection