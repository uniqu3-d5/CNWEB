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
		$userId = json_decode(JWT::get_data($_COOKIE['token']), true)['id'];
		$user = User::find($userId);
		$post = new Post([
			'title' => $data['title'],
			'img' => $data['img'],
		]);
		$user->post()->save($post);
		echo 'ok';
	}
	public function delete($id){
		Post::destroy($id);
	}
}
