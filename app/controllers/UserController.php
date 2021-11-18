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
			'user' => User::find($id),
			'posts' => User::find($id)->post()->orderBy('id', 'desc')->get()
		];
		echo $this->view->render('pages/profile', $data);
		// print_r(User::find($id)->post()->orderBy('id','desc')->get());
	}
	public function user($idUser){
		$id = json_decode(JWT::get_data($_COOKIE['token']), true)['id'];
		if($idUser === $id){
			redirect('/profile');
		}
		$data = [
			'user' => User::find($idUser),
			'posts' => User::find($idUser)->post()->orderBy('id', 'desc')->get()
		];
		echo $this->view->render('pages/user', $data);
	}

	public function edit(){
		$json = file_get_contents('php://input');

		// Converts it into a PHP object
		$data = json_decode($json, true);
		$userId = json_decode(JWT::get_data($_COOKIE['token']), true)['id'];
		$user = User::find($userId);
		$user->name = $data['name'];
		if(isset($data['img'])){
			$user->avt = $data['img'];
		}
		$user->save();
	}
}