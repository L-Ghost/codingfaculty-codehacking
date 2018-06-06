@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    <table class="table">
        <thead>
            <th>Id</th>
            <th>Photo</th>
            <th>User</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </thead>

        @if($posts)
            @foreach($posts as $post)
                <tbody>
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>
                            <img style="height: 40px;" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="">
                        </td>
                        <td>{{$post->user ? $post->user->name : 'no user found'}}</td>
                        <td>{{$post->category_id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>
                </tbody>
            @endforeach
        @endif

    </table>

@stop