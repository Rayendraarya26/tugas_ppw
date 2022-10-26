@extends('layouts.base')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container color_post">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                {!! \Session::get('success') !!}
            </div>
        @endif
            <h1>Blog Posts</h1>
            <a href="/posts/create">Create New Projects</a>
            @if(count($posts)>0)
                @foreach ($posts as $post)
                    <div class="well">
                        <h3><a href="/posts/{{$post->id}}">
                        {{$post->title}}</a></h3>
                        <small>
                            Tanggal: {{$post->created_at}}
                        </small>
                    </div>
                @endforeach
                <br>
                Halaman : {{ $posts->currentPage() }} <br/>
                Jumlah Data : {{ $posts->total() }} <br/>
                Data Per Halaman : {{ $posts->perPage() }} <br/>
                <div class="d-flex">
                {{ $posts->links() }}
                </div>
            @else
                <h3>Tidak ada data.</h3>
            @endif
        </div>
    </div>
@endsection