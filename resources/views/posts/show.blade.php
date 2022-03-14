@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>

            <div class="d-flex" style="height: 36.4px;">
                <button class="btn btn-outline-primary" style="height: 36px; margin-right: 8px;">Show</button>
                <a href="/posts/{{ $post->id }}/edit" class="btn btn-outline-primary" style="height: 36px; margin-right: 8px;">Edit</a>
                <form action="/posts/{{ $post->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-outline-danger" style="height: 36px; margin-right: 8px;">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <a href="/posts/{{ $post->id }}/edit">Edit</a> |
    <a href="/posts">Back</a>

@endsection
