<?php

namespace App\Controllers;

use App\Models\User;
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
		echo $this->view->render('parts/home');
	}
}