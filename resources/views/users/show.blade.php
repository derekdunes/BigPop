@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
            <h3 class="card-title">Showing User : {{ $user->first_name }} {{ $user->last_name}}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table">
                        <table class="table table-striped">
                                                        <tr>
                                                            <td>Bio : {{ $user->bio}}
                                                                </td>
                                                                <td><img src='{{ $user->profile_pic}}'></td>
                                                        </tr>

                                                        <tr>
                                                                <td>Role : {{ $user->role->name }}</td>  
                                                        </tr>

<!--                                                         <tr>
                                                                <td>BirthDay : </td>  
                                                        </tr> -->

                                                        <tr>
                                                                <td>Email : {{$user->email}}</td>  
                                                        </tr>

                                                        <tr>
                                                                <td>User Hits : {{$user->user_views}}</td>  
                                                        </tr> 

                                                        <tr>
                                                                <td> Movies Actor : 
                                                                    <ul>
                                                                        @foreach($user->movies as $movie)
                                                                            <li><a href="{{ route('movies.show', $movie->id) }}">
                                                                                {{ $movie->name }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>  
                                                        </tr>

                                                        <tr>
                                                                <td>User Photos : 
                                                                    <ul>
                                                                        @foreach($user->photos as $photo)
                                                                            <li><a href="{{ route('photos.show', $photo->id) }}">
                                                                                {{ $photo->description }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>  
                                                        </tr>

                                                        <tr>
                                                                <td> Videos : 
                                                                    <ul>
                                                                        @foreach($user->videos as $video)
                                                                            <li><a href="{{ route('videos.show', $video->id) }}">
                                                                                {{ $video->description }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>  
                                                        </tr>                                                        

                                                </table>
                                            </div>
                                </div>
                    </div>

                    <a href="{{ route('movies.index') }}" class="btn btn-link">Back</a>

            </div>
        </div>
</div>
@endsection
