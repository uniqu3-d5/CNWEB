<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Controllers\Controller;
use App\JWT;

class UserController extends Controller{
	protected static $user;
	public function __construct(){
		if (!JWT::isLogin()) {
            redirect('/login');
        }
        parent::__construct();
	}

	public function profile(){
		$id = json_decode(JWT::get_data($_COOKIE['token']), true)['id'];
		$data = [
			'user' => User::find($id)
		];
		echo $this->view->render('pages/profile', $data);
	}
}