<?php
include_once 'apiClient.php';
class test{
    public function __construct() {
        echo 'jopop';
              //  return;
        $this->_provider = new apiClient();
    }
    
    public static function f1(){
        echo "f1";
    }
    
}