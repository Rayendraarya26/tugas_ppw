@extends('layouts.base')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container color_post">
            <h1>Edit Blog Post</h1>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <form action="{{ route('posts.update', $posts->id) }}" method="post">
            @method('PUT')
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control 
                    @error('title')
                        is-invalid
                    @enderror" aria-describedby="emailHelp" name="title" value="{{ $posts->title }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control 
                    @error('description')
                        is-invalid
                    @enderror" name="description" id="description" rows="5">{{ $posts->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button><br><br>
                <a href="/posts/{{ $posts->id }}">Back</a>
            </form>
        </div>
    </div>
@endsection