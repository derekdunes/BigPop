@extends('layouts.app')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/search.js') }}" defer></script>


<div class="container">
    <form class="card" role="form" method="POST" action="{{ route('movies.update',$movie->id) }}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden"  id="crew_value" name="crew_value" value="">
        <input type="hidden"  id="cast_value"  name="cast_value"  value="">
        
        {{ csrf_field() }}
         <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                <h3 class="card-title">Editing Movie : {{ $movie->name }}</h3>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Name</label>
                                      <input id="name" name="name" class="form-control" placeholder="Movie Name" value="{{ $movie->name }}" type="text">
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Movie Release Date</label>
                                        <input  id="release_date" name="release_date" class="form-control" placeholder="Movie Release Date" value="{{ \Carbon\Carbon::parse($movie->release_date)->format('Y-m-d') }}" type="date">
                                      </div>
                                  </div>

                              <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                      <label class="form-label">Image URL</label>
                                      <input  id="image" name="image" class="form-control" placeholder="Movie Image" value="{{ $movie->image }}" type="text">
                                    
                                    </div>
                              </div>                            

                              <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                      <label class="form-label">Image Cover URL</label>
                                      <input  id="cover_photo" name="cover_photo" class="form-control" placeholder="Movie Cover Image" value="{{ $movie->cover_photo }}" type="text">
                                    
                                    </div>
                              </div>

                              <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Popular Rating</label>
                                        <input id="pop_rating" name="pop_rating" class="form-control" type="number" max="10" min="0" value="{{ $movie->pop_rating}}" placeholder="Movie Popularity Rating">
                                   </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                      <div class="form-group">
                                        <label class="form-label">Rating</label>
                                        <select id="rating_id" name="rating_id" class="form-control custom-select">
                                          @foreach($ratings as $rating)
                                            @if($movie->rating_id == $rating->id)
                                            <option value="{{$rating->id}}" selected="selected">{{$rating->name}}</option>    
                                            @else
                                            <option value="{{$rating->id}}">{{$rating->name}}</option>
                                            @endif
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                                
                                <div class="col-sm-6 col-md-4">
                                  <div class="form-group">
                                        <label class="form-label">Plot</label>
                                        <textarea id="plot" name="plot" rows="5" class="form-control" placeholder="Movie plot goes here">{{ $movie->plot }}</textarea>
                                  </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Movie Length</label>
                                        <input id="movie_length" name="movie_length" class="form-control" type="text" placeholder="eg 2hrs 10mins" value="{{ $movie->movie_length }}">
                                   </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Movie Studio</label>
                                        <input id="movie_studio" name="movie_studio" class="form-control" type="text" placeholder="eg Universal Studio" value="{{ $movie->movie_studio }}">
                                   </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Country of Origin</label>
                                        <input id="country" name="country" class="form-control" type="text" placeholder="eg USA" value="{{ $movie->country }}">
                                   </div>
                                </div>                                
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Imdb Movie Id</label>
                                        <input id="imdb_id" name="imdb_id" class="form-control" type="text" placeholder="eg tt4154756" value="{{ $movie->imdb_id}}">
                                   </div>
                                </div>

                            <div class="col-sm-6 col-md-4"> 
                              <div class="form-group">
                                <label for="name" class="form-label">Select the Genre Types</label><br>
                                    @php 
                                      $count = 0
                                    @endphp
                                    @foreach($genres as $genre)
                                      @foreach($movie->genres as $gen)                                          
                                            @if($genre->id == $gen->id)
                                                @if($genre->id % 4 == 0)
                                                  <input type="checkbox" name="genres[]" value="{{ $genre->id }}" checked> {{ $genre->name }} <br>
                                                @else
                                                  <input type="checkbox" name="genres[]" value="{{ $genre->id }}" checked> {{ $genre->name }}
                                                @endif
                                                @php 
                                                  $count = 1;
                                                  break;
                                                @endphp                                                
                                            @endif
                                      @endforeach
                                      @if($count == 1)
                                        @php 
                                          $count = 0
                                        @endphp
                                      @else
                                        @if($genre->id % 4 == 0)
                                          <input type="checkbox" name="genres[]" value="{{ $genre->id }}"> {{ $genre->name }} <br>
                                        @else
                                          <input type="checkbox" name="genres[]" value="{{ $genre->id }}"> {{ $genre->name }}
                                        @endif
                                      @endif

                                    @endforeach
                            </div>
                          </div>

                           <div class="col-sm-6 col-md-4"> 
                              <div class="form-group" id="selected-casts">
                                <label for="name" class="form-label">Select/Remove Casts</label><br>
                                  @if(count($movie->casts) > 0)
                                    @foreach($movie->casts as $cast)                                          
                                      <input type="checkbox" name="casted[]" value="{{ $cast->id }}" checked> {{ $cast->first_name }} {{ $cast->last_name }} <br>
                                    @endforeach
                                  @endif
                              </div>
                          </div>

                          <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                      <label class="form-label">Add Actors to movie</label>
                                      <input id="casts" name="casts" class="form-control" placeholder="Movie Casts Search" value="" type="text">
                                    
                                    </div>
                          </div>

                          <div class="actor_res">  
                          </div>

                          <div class="col-sm-6 col-md-4"> 
                              <div class="form-group" id="selected-photos">
                                <label for="name" class="form-label">Select/Remove Photos</label><br>
                                  @if(count($movie->photos) > 0)
                                    @foreach($movie->photos as $photo)                                          
                                      <input type="checkbox" name="photod[]" value="{{ $cast->id }}" checked>{{ $photo->description }} <br>
                                    @endforeach
                                  @endif
                              </div>
                          </div>

                          <div class="col-sm-6 col-md-4">
                              <div class="form-group">
                                      <label class="form-label">Add Photos to movie</label>
                                      <input  id="photo" name="photo" class="form-control" placeholder="Movie Photos Search" value="" type="text">
                              </div>
                          </div>

                          <div class="photo_res">  
                          </div>

                          <div class="col-sm-6 col-md-4"> 
                              <div class="form-group" id="selected-videos">
                                <label for="name" class="form-label">Select/Remove Video</label><br>
                                  @if(count($movie->videos) > 0)
                                    @foreach($movie->videos as $video)                                          
                                      <input type="checkbox" name="videod[]" value="{{ $video->id }}" checked>{{ $video->description }} <br>
                                    @endforeach
                                  @endif
                              </div>
                          </div>                          

                          <div class="col-sm-6 col-md-4">
                              <div class="form-group">
                                      <label class="form-label">Add Videos to movie</label>
                                      <input  id="video" name="genre" class="form-control" placeholder="Movie Video Search" value="" type="text">
                              </div>
                          </div>

                          <div class="video_res">  
                          </div>                          

                </div>                 
            </div>
        </div>
        
        <div class="card-footer text-right">
                <div class="d-flex">
                  <a href="{{ route('movies.index') }}" class="btn btn-link">Cancel</a>
                  <button type="submit" class="btn btn-primary ml-auto">Update</button>
                </div>
        </div>

   
    
    </div>
</form>
</div>

@endsection

@section('custom_scripts')

@endsection

