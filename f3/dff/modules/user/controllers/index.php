<?php
namespace user\controllers;
use user as U;
class index{
    
    public function __construct(){
        $_provider = new \apiClient();
        var_dump($_provider);
        $_model = new U\models\user;
        var_dump($_model);
        //render index view
    }
    
}
