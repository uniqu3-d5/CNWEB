<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Controllers\Controller;
use App\JWT;

class PostController extends Controller{
	public function __construct(){
		if (!JWT::isLogin()) {
            redirect('/login');
        }
        
        parent::__construct();
	}


	public function createPost(){
		$json = file_get_contents('php://input');

		// Converts it into a PHP object
		$data = json_decode($json, true);
		// echo $json;
		Post::create([
			'title' => $data['title'],
			'img' => $data['img']
		]);
		echo 'ok';
	}

	public function getPosts(){
		$posts = Post::all();
		foreach($posts as $post){
			echo $post->id.'<br>';		
			echo $post->title.'<br>';
			echo '<img class="img-fluid"
                        src="'.$post->img.'" alt="">';				
		}
	}
}
