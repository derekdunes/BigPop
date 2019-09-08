$(document).ready(function(){

      //when value is being typed in

    $("#photo").on("input",function(){
      var searchValue = $(this).val();
      console.log(searchValue);

      //setup ajax token for fetching data 
       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      //fetch the data from the database
      $.ajax({
        url: '/get/photos/'+searchValue,//route to fetch the data
        type: 'GET',
        datatype: 'json',
        success: function(result){
          var newResult = JSON.parse(result);

          //create the new specialist select options
          
          createPhotos(newResult);
        }
      });

  
      function createPhotos(photos){

        var $photo_res = $("div[class='photo_res']").empty();

        for( var i = photos.length - 1; i >= 0; i--){

            var $mini_div = $("<div>", {class: "col-sm-6 col-md-4"});

            var $form_group = $("<div>", {class: "form-group"});

            var $card = $("<div>", {class: "card", style:"width:400px"});

            var $card_img = $("<img>", {class: "card-img-top", src: "https://resizing.flixster.com/8nFCY03VSXGoMURFdpJpZmIvim0=/100x120/v1.cjs0MDcwNDtqOzE4MTgwOzEyMDA7Mjc1OzIzMw"});

            var $card_body = $("<div>", {class:"card-body"});

            var $photo = photos[i].description;
            
            var $card_title = $("<h4>", {class:"card-title", value:photos[i].id});

            $card_title.append($photo);

            var $add_btn = $("<a>", {class:"btn btn-primary"});

            $add_btn.click({id: photos[i].id, name: $photo}, function(e){
              
              addPhoto(e.data.id, e.data.name);

            });

            $add_btn.append("Add to Photos");

            $card_body.append($card_title);
            $card_body.append($add_btn);

            $card.append($card_img);
            $card.append($card_body);

            $form_group.append($card);

            $mini_div.append($form_group);

            $photo_res.append($mini_div);

          }

      }      

      function addPhoto($id, $name){

        var $casts_div = $("div[id='selected-photos']");

        var $cast = $("<div>", {class:"row"});

        var $cast_id = $("<input>", {class:"col-md-2", type:"checkbox", name:"photod[]", value:$id, checked: true});

        var $cast_name = $("<h6>", {class:"col-md-10", style:"text-align: left"});
        
        $cast_name.append($name);

        $cast.append($cast_id);
        $cast.append($cast_name);

        $casts_div.append($cast);

      }

    });

    $("#video").on("input",function(){

      var searchValue = $(this).val();
      console.log(searchValue);

      //setup ajax token for fetching data 
       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      //fetch the data from the database
      $.ajax({
        url: '/get/videos/'+searchValue,//route to fetch the data
        type: 'GET',
        datatype: 'json',
        success: function(result){
          var newResult = JSON.parse(result);

          //create the new specialist select options
          
          createVideos(newResult);
        }

      });

      function createVideos(videos){

        var $video_res = $("div[class='video_res']").empty();

        for( var i = videos.length - 1; i >= 0; i--){

            var $mini_div = $("<div>", {class: "col-sm-6 col-md-4"});

            var $form_group = $("<div>", {class: "form-group"});

            var $card = $("<div>", {class: "card", style:"width:400px"});

            var $card_img = $("<img>", {class: "card-img-top", src: "https://resizing.flixster.com/8nFCY03VSXGoMURFdpJpZmIvim0=/100x120/v1.cjs0MDcwNDtqOzE4MTgwOzEyMDA7Mjc1OzIzMw"});

            var $card_body = $("<div>", {class:"card-body"});

            var $video = videos[i].description;
            
            var $card_title = $("<h4>", {class:"card-title", value:videos[i].id});

            $card_title.append($video);

            var $add_btn = $("<a>", {class:"btn btn-primary"});

            $add_btn.click({id: videos[i].id, name: $video}, function(e){
              
              addVideo(e.data.id, e.data.name);

            });

            $add_btn.append("Add to Video");

            $card_body.append($card_title);
            $card_body.append($add_btn);

            $card.append($card_img);
            $card.append($card_body);

            $form_group.append($card);

            $mini_div.append($form_group);

            $video_res.append($mini_div);

          }

      }

      function addVideo($id, $name){

        var $casts_div = $("div[id='selected-videos']");

        var $cast = $("<div>", {class:"row"});

        var $cast_id = $("<input>", {class:"col-md-2", type:"checkbox", name:"videod[]", value:$id, checked: true});

        var $cast_name = $("<h6>", {class:"col-md-10", style:"text-align: left"});
        
        $cast_name.append($name);

        $cast.append($cast_id);
        $cast.append($cast_name);

        $casts_div.append($cast);

      }


    });

      //get the name value from the DB
    $("#casts").on("input", function(){

        var searchValue = $(this).val();

        //setup ajax token for fetching data 
       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      //fetch the data from the database
      $.ajax({
        url: '/get/actors/'+searchValue,//route to fetch the data
        type: 'GET',
        datatype: 'json',
        success: function(result){
          var newResult = JSON.parse(result);

          //create the new specialist select options
          
          createActors(newResult);
        }
      });

    function createActors(actors){

      var $actor_res = $("div[class='actor_res']").empty();

      for( var i = actors.length - 1; i >= 0; i--){

        var $mini_div = $("<div>", { class: "col-sm-6 col-md-4"});

        var $form_group = $("<div>", {class: "form-group"});

        var $card = $("<div>", {class: "card", style:"width:400px"});

        var $card_img = $("<img>", {class: "card-img-top", src: "https://resizing.flixster.com/8nFCY03VSXGoMURFdpJpZmIvim0=/100x120/v1.cjs0MDcwNDtqOzE4MTgwOzEyMDA7Mjc1OzIzMw"});

        var $card_body = $("<div>", {class:"card-body"});

        var $actor = actors[i].first_name + ' ' + actors[i].last_name;
        
        var $card_title = $("<h4>", {class:"card-title", value:actors[i].id});

        $card_title.append($actor);

        var $add_btn = $("<a>", {class:"btn btn-primary", value: "Add to Cast"});

        $add_btn.click({id: actors[i].id, name: $actor}, function(e){
          
          addActor(e.data.id, e.data.name);

        });

        $add_btn.append("Add to Cast");

        $card_body.append($card_title);
        $card_body.append($add_btn);

        $card.append($card_img);
        $card.append($card_body);

        $form_group.append($card);

        $mini_div.append($form_group);

        $actor_res.append($mini_div);

      }
    }

      function addActor($id, $name){

        var $casts_div = $("div[id='selected-casts']");

        var $cast = $("<div>", {class:"row"});

        var $cast_id = $("<input>", {class:"col-md-2", type:"checkbox", name:"casted[]", value:$id, checked: true});

        var $cast_name = $("<h6>", {class:"col-md-10", style:"text-align: left"});

        var $break = $("<br>");
        
        $cast_name.append($name);

        $cast.append($cast_id);
        $cast.append($cast_name);
        $cast.append($break);

        $casts_div.append($cast);

    }

    });

    // function clearCastRes(){
    //   $("div[class='actor_res']").empty();
    // }
    
    // function clearVideoRes(){
    //   $("div[class='video_res']").empty();
    // }

    // function clearPhotoRes(){
    //   $("div[class='photo_res']").empty();
    // }

  });