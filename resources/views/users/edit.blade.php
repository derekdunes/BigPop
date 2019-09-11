@extends('layouts.app')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/search.js') }}" defer></script>


<div class="container">
    <form class="card" role="form" method="POST" action="{{ route('users.update',$user->id) }}">
            <input type="hidden" name="_method" value="PUT">

        {{ csrf_field() }}
        
         <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                <h3 class="card-title">Editing User : {{ $user->first_name }} {{$user->last_name}}</h3>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">First Name</label>
                                      <input id="first_name" name="first_name" class="form-control" value="{{$user->first_name}}" placeholder="First Name" value="" type="text">
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                      <input id="last_name" name="last_name" class="form-control" value="{{$user->last_name}}" placeholder="Last Name" value="" type="text">
                                      </div>
                                  </div>                                 
                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Email</label>
                                      <input id="email" name="email" class="form-control" value="{{$user->email}}" type="email">
                                      </div>
                                  </div>                   
                               
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                      <label class="form-label">Roles</label>
                                        <select id="role_id" name="role_id" class="form-control custom-select">
                                          @foreach($roles as $role)
                                            @if($role->id != 1)
                                              @if($user->role_id == $role->id)
                                                <option value="{{$role->id}}" selected="selected">{{$role->name}}</option>    
                                              @else
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                              @endif
                                            @endif
                                          @endforeach
                                        </select>
                                    </div>
                                </div>

                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Date of Birth</label>
                                        <input  id="birth_date" name="birth_date" class="form-control" value="{{ \Carbon\Carbon::parse($user->birth_date)->format('Y-m-d') }}" placeholder="Date of Birth" type="date">
                                      </div>
                                  </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                      <label class="form-label">Image URL</label>
                                      <input  id="image" name="image" class="form-control" value="image" placeholder="Movie Image" value="" type="text">
                                    </div>
                              </div>                            
                                
                              <div class="col-sm-6 col-md-4">
                                  <div class="form-group">
                                    <label class="form-label">Bio</label>
                                    <textarea id="bio" name="bio" rows="5" cols="5" class="form-control" placeholder="Tell us about yourself">{{ $user->bio }}</textarea>
                                  </div>
                              </div>

                            <div class="col-sm-6 col-md-4"> 
                              <div class="form-group" id="selected-movies">
                                <label for="name" class="form-label">Select/Remove Movie</label><br>
                                 @if(count($user->movies) > 0)
                                    @foreach($user->movies as $movie)                                          
                                      <input type="checkbox" name="movied[]" value="{{ $movie->id }}" checked> {{ $movie->name }} <br>
                                    @endforeach
                                  @endif
                              </div>
                          </div>

                          <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                      <label class="form-label">Add Movies to you Featured In</label>
                                      <input id="movie" name="movie" class="form-control" placeholder="Movies Search" type="text">
                                    </div>
                          </div>

                          <div class="movie_res">  
                          </div>

                          <div class="col-sm-6 col-md-4"> 
                              <div class="form-group" id="selected-photos">
                                <label for="name" class="form-label">Select/Remove Photos</label><br>
                                  @if(count($user->photos) > 0)
                                    @foreach($user->photos as $photo)                                          
                                      <input type="checkbox" name="photod[]" value="{{ $photo->id }}" checked>{{ $photo->description }} <br>
                                    @endforeach
                                  @endif
                              </div>
                          </div>

                          <div class="col-sm-6 col-md-4">
                              <div class="form-group">
                                      <label class="form-label">Add Photos to User</label>
                                      <input  id="photo" name="photo" class="form-control" placeholder="Movie Photos Search" value="" type="text">
                              </div>
                          </div>

                          <div class="photo_res">  
                          </div>

                          <div class="col-sm-6 col-md-4"> 
                              <div class="form-group" id="selected-videos">
                                <label for="name" class="form-label">Select/Remove Video</label><br>
                                  @if(count($user->videos) > 0)
                                    @foreach($user->videos as $video)                                          
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

