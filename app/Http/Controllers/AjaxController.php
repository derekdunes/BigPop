<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Photos;
use App\Videos;

class AjaxController extends Controller
{	

	function getActors($actorName){

		$roles = array('2','3','4', '5', '6','7', '8', '9');

		$actors = User::where('first_name', 'LIKE', '%'.$actorName.'%')->orWhere('last_name', 'LIKE', '%'.$actorName.'%')->whereIn('role_id', $roles)->get();//

		echo json_encode($actors);

		exit;
	}


	function getPhotos($photo){

		$photos = Photos::where('description', 'LIKE', '%'.$photo.'%')->get();

		echo json_encode($photos);

		exit;
	}

	function getVideos($video){

		$videos = Videos::where('description', 'LIKE', '%'.$video.'%')->get();

		echo json_encode($videos);

		exit;
	}
}
