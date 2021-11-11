<?php

namespace App\Controllers;

use App\SessionGuard as Guard;
use App\Csrf;

class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new \League\Plates\Engine(ROOTDIR.'views');
    }  
 

    // Lưu các giá trị của $_POST vào $_SESSION 
    protected function saveFormValues(array $except = [])
    {
        $form = [];
        foreach($_POST as $key => $value) {
            if (! in_array($key, $except, true)) {
                $form[$key] = $value;
            }
        }
        $_SESSION['form'] = $form; 
    } 

    public function notFound(){
        http_response_code(404);
        echo $this->view->render('errors/404');
        exit();
    }
}
