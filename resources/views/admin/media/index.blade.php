@extends('layouts.admin')


@section('content')

    <h1>Media</h1>

    @if(Session::has('deleted_image'))
        <p class="bg-danger">{{session('deleted_image')}}</p>
    @endif

    @if($photos)

        <table class="table">

            <thead>
                <th>Id</th>
                <th>File</th>
                <th>Created</th>
            </thead>

            <tbody>

                @foreach($photos as $photo)

                    <tr>
                        <td>{{$photo->id}}</td>
                        <td>
                            <img style="height: 40px;" src="{{$photo->file}}" alt="">
                        </td>
                        <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                        <td>

                            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediaController@destroy', $photo->id]]) !!}

                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                </div>

                            {!! Form::close() !!}

                        </td>
                    </tr>

                @endforeach

            </tbody>

        </table>

    @endif

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$photos->render()}}
        </div>
    </div>

@stop