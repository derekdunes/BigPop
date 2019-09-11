@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div id="message" name="message" class="alert alert-icon alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"></button>
                <i class="fe fe-check mr-2" aria-hidden="true"></i> {{ session('message') }}
    </div>
    @endif
    
    <div class="row justify-content-center">
        

        <h1 class="page-title"> Headlines </h1>
      
        <div class="col-md-12">
           
            <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id </th>
                            <th>Name </th>                    
                            <th>Year </th>
                            <th>Image </th>
                            <th>Rating </th>
                            <th>Country </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    @foreach($headline as $movie)
                        <tr>
                            <td>{{ $movie->id }}</td>
                            <td>{{ $movie->name }}</td>
                            <td>{{ $movie->release_date }}</td>
                            <td><img src='{{ $movie->image }}' class="img-rounded" /></td>
                            <td>{{ $movie->rating->name }}</td>
                            <td>{{ $movie->country }}</td>
                            <td>
                                <a class="btn btn-sm" href="{{ route('movies.show',$movie->id)}}">View</a> | 
                                <a class="btn btn-sm" href="{{ route('movies.edit',$movie->id)}}">Edit</a> | 
                                <a class="btn btn-sm"><form method="POST" action="movies/{{ $movie->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-link">Delete</button>       
                                    </form>
                                </a>                                        
                                
                            </td>

                        </tr>
                    @endforeach
                </table>
                
              

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                    <a class="btn btn-primary ml-auto" href="{{ route('movies.create')}}">Add a new Movie</a>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>

        <div class="row justify-content-center">
        

        <h1 class="page-title"> latestMovies </h1>
      
        <div class="col-md-12">
           
            <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id </th>
                            <th>Name </th>                    
                            <th>Year </th>
                            <th>Image </th>
                            <th>Rating </th>
                            <th>Country </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    @foreach($latestMovies as $movie)
                        <tr>
                            <td>{{ $movie->id }}</td>
                            <td>{{ $movie->name }}</td>
                            <td>{{ $movie->release_date }}</td>
                            <td><img src='{{ $movie->image }}' class="img-rounded" /></td>
                            <td>{{ $movie->rating->name }}</td>
                            <td>{{ $movie->country }}</td>
                            <td>
                                <a class="btn btn-sm" href="{{ route('movies.show',$movie->id)}}">View</a> | 
                                <a class="btn btn-sm" href="{{ route('movies.edit',$movie->id)}}">Edit</a> | 
                                <a class="btn btn-sm"><form method="POST" action="movies/{{ $movie->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-link">Delete</button>       
                                    </form>
                                </a>                                        
                                
                            </td>

                        </tr>
                    @endforeach
                </table>
                
              

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                    <a class="btn btn-primary ml-auto" href="{{ route('movies.create')}}">Add a new Movie</a>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>

        <div class="row justify-content-center">
        

        <h1 class="page-title"> Trending Movies </h1>
      
        <div class="col-md-12">
           
            <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id </th>
                            <th>Name </th>                    
                            <th>Year </th>
                            <th>Image </th>
                            <th>Rating </th>
                            <th>Country </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    @foreach($trendingMovies as $movie)
                        <tr>
                            <td>{{ $movie->id }}</td>
                            <td>{{ $movie->name }}</td>
                            <td>{{ $movie->release_date }}</td>
                            <td><img src='{{ $movie->image }}' class="img-rounded" /></td>
                            <td>{{ $movie->rating->name }}</td>
                            <td>{{ $movie->country }}</td>
                            <td>
                                <a class="btn btn-sm" href="{{ route('movies.show',$movie->id)}}">View</a> | 
                                <a class="btn btn-sm" href="{{ route('movies.edit',$movie->id)}}">Edit</a> | 
                                <a class="btn btn-sm"><form method="POST" action="movies/{{ $movie->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-link">Delete</button>       
                                    </form>
                                </a>                                        
                                
                            </td>

                        </tr>
                    @endforeach
                </table>
                
              

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                    <a class="btn btn-primary ml-auto" href="{{ route('movies.create')}}">Add a new Movie</a>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>

        <div class="row justify-content-center">
        

        <h1 class="page-title"> Upcoming Movies </h1>
      
        <div class="col-md-12">
           
            <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id </th>
                            <th>Name </th>                    
                            <th>Year </th>
                            <th>Image </th>
                            <th>Rating </th>
                            <th>Country </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    @foreach($upcomingMovies as $movie)
                        <tr>
                            <td>{{ $movie->id }}</td>
                            <td>{{ $movie->name }}</td>
                            <td>{{ $movie->release_date }}</td>
                            <td><img src='{{ $movie->image }}' class="img-rounded" /></td>
                            <td>{{ $movie->rating->name }}</td>
                            <td>{{ $movie->country }}</td>
                            <td>
                                <a class="btn btn-sm" href="{{ route('movies.show',$movie->id)}}">View</a> | 
                                <a class="btn btn-sm" href="{{ route('movies.edit',$movie->id)}}">Edit</a> | 
                                <a class="btn btn-sm"><form method="POST" action="movies/{{ $movie->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-link">Delete</button>       
                                    </form>
                                </a>                                        
                                
                            </td>

                        </tr>
                    @endforeach
                </table>
                
              

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                    <a class="btn btn-primary ml-auto" href="{{ route('movies.create')}}">Add a new Movie</a>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>


</div>
@endsection
