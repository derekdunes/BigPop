@extends('layouts.app')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- Scripts -->
<script src="{{ asset('js/search.js') }}" defer></script>

<div class="container">
     <form class="card" role="form" method="POST" action="{{ route('users.store') }}">
        
        {{ csrf_field() }}
         <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                <h3 class="card-title">Create a new User </h3>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">First Name</label>
                                      <input id="first_name" name="first_name" class="form-control" placeholder="First Name" value="" type="text">
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                      <input id="last_name" name="last_name" class="form-control" placeholder="Last Name" value="" type="text">
                                      </div>
                                  </div>                                 
                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Email</label>
                                      <input id="email" name="email" class="form-control" placeholder="name@example.com" type="email">
                                      </div>
                                  </div>                   

                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Password</label>
                                      <input id="password" name="password" class="form-control" type="password">
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Confirm Password</label>
                                      <input id="confirm_password" name="confirm_password" class="form-control" type="password">
                                      </div>
                                  </div>                               
                                <div class="col-sm-6 col-md-4">
                                      <div class="form-group">
                                        <label class="form-label">Role Type</label>
                                        <select id="role_id" name="role_id" class="form-control custom-select">
                                          @foreach($roles as $role)
                                            @if($role->id != 1)
                                              <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endif
                                          @endforeach
                                        </select>
                                      </div>
                                </div>

                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Date of Birth</label>
                                        <input  id="birth_date" name="birth_date" class="form-control" placeholder="Date of Birth" type="date">
                                      </div>
                                  </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                      <label class="form-label">Image URL</label>
                                      <input  id="image" name="image" class="form-control" placeholder="Movie Image" value="" type="text">
                                    </div>
                              </div>                            
                                
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                      <label class="form-label">Bio</label>
                                      <textarea id="bio" name="bio" rows="5" cols="5" class="form-control" placeholder="Tell us about yourself"></textarea>
                                    </div>
                                </div>

                            <div class="col-sm-6 col-md-4"> 
                              <div class="form-group" id="selected-movies">
                                <label for="name" class="form-label">Select/Remove Movie</label><br>
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
                              </div>
                          </div>

                          <div class="col-sm-6 col-md-4">
                              <div class="form-group">
                                      <label class="form-label">Add Photos to movie</label>
                                      <input  id="photo" name="photo" class="form-control" placeholder="Movie Photos Search" value="" type="text">
                                      <!-- <a class="btn btn-primary" onclick="clearPhotoRes()">Clear</a> -->
                              </div>
                          </div>

                          <div class="photo_res">  
                          </div>

                          <div class="col-sm-6 col-md-4"> 
                              <div class="form-group" id="selected-videos">
                                <label for="name" class="form-label">Select/Remove Video</label><br>
                              </div>
                          </div>                          

                          <div class="col-sm-6 col-md-4">
                              <div class="form-group">
                                      <label class="form-label">Add Videos to movie</label>
                                      <input  id="video" name="genre" class="form-control" placeholder="Movie Video Search" value="" type="text">
                                      <!-- <a class="btn btn-primary" onclick="clearVideoRes()">Clear Results</a> -->
                              </div>
                          </div>

                          <div class="video_res">  
                          </div>                                    
                </div>
        </div>
        
        <div class="card-footer text-right">
                <div class="d-flex">
                  <a href="{{ route('movies.index') }}" class="btn btn-link">Cancel</a>
                  <button type="submit" class="btn btn-primary ml-auto">Submit</button>
                </div>
        </div>

   
    
    </div>
</form>
</div>

@endsection

@section('custom_scripts')

<!-- <script>

  function clearCastRes(){
    $("div[class='actor_res']").empty();
  }
  
  function clearVideoRes(){
    $("div[class='video_res']").empty();
  }

  function clearPhotoRes(){
    $("div[class='photo_res']").empty();
  }

</script> -->
@endsection

