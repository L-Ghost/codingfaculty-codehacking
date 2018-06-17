@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_post'))
        <p class="bg-danger">{{session('deleted_post')}}</p>
    @endif

    @if(Session::has('updated_post'))
        <p class="bg-info">{{session('updated_post')}}</p>
    @endif

    <h1>Posts</h1>

    <table class="table">
        <thead>
            <th>Id</th>
            <th>Photo</th>
            <th>User</th>
            <th>Category</th>
            <th>Title</th>
            <th></th>
            <th></th>
            <th>Created</th>
            <th>Updated</th>
        </thead>

        @if($posts)
            @foreach($posts as $post)
                <tbody>
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>
                            <img style="height: 40px;" src="{{$post->photo ? $post->photo->file : $post->photoPlaceholder()}}" alt="">
                        </td>
                        <td>{{$post->user ? $post->user->name : 'no user found'}}</td>
                        <td>{{$post->category ? $post->category->name : 'uncategorized'}}</td>
                        <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                        <td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>
                        <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>
                </tbody>
            @endforeach
        @endif

    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>

@stop