<?php

namespace App\Controllers;

use App\Models\User;	
use App\Models\Post;	
use App\Controllers\Controller;
use App\JWT;

class HomeController extends Controller{
	public function __construct(){
		if (!JWT::isLogin()) {
            redirect('/login');
        }
        
        parent::__construct();
	}

	public function viewHome(){		
		$id = json_decode(JWT::get_data($_COOKIE['token']), true)['id'];
		$data = [
			'posts' => Post::all(),
			'user' => User::find($id),
		];
		echo $this->view->render('pages/home', $data);
	}
}