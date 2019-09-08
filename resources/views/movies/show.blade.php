@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="card-header">
                    <h3 class="card-title">Showing Movie : {{ $movie->name }}</h3>
                    </div>
                    <div class="card-body">
                                <div class="row">
                                        <div class="table">
                                                <table class="table table-striped">
                                                        <tr>
                                                                <td><strong>{{ $movie->name}}</strong>: 
                                                                        {{ $movie->plot}}
                                                                </td>
                                                                <td><img src='{{ $movie->image}}'></td>
                                                        </tr>

                                                        <tr>
                                                                <td>Year : {{ \Carbon\Carbon::parse($movie->release_date)->format('M d, Y') }}</td>  
                                                        </tr> 

                                                        <tr>
                                                                <td>Year : {{$movie->rating->name}}</td>  
                                                        </tr>

                                                        <tr>
                                                                <td>Movie Studio : {{$movie->movie_studio}}</td>  
                                                        </tr>                            

                                                        <tr>
                                                                <td>Movie Length : {{$movie->movie_length}}</td>  
                                                        </tr> 

                                                        <tr>
                                                                <td>Country : {{$movie->country}}</td>  
                                                        </tr>                                                                           
                                                        <tr>
                                                                <td>Movie Hits : {{$movie->movie_views}}</td>  
                                                        </tr> 

                                                        <tr>
                                                                <td>Genres : 
                                                                    <ul>
                                                                        @foreach($movie->genres as $genre)
                                                                            <li><a href="{{ route('genres.show', $genre->id) }}">
                                                                                {{ $genre->name }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>  
                                                        </tr>

                                                        <tr>
                                                                <td> Cast : 
                                                                    <ul>
                                                                        @foreach($movie->casts as $cast)
                                                                            <li><a href="{{ route('users.show', $cast->id) }}">
                                                                                {{ $cast->first_name }} {{ $cast->last_name }}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>  
                                                        </tr>

                                                        <tr>
                                                                <td> Photos : 
                                                                    <ul>
                                                                        @foreach($movie->photos as $photo)
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
                                                                        @foreach($movie->videos as $video)
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
