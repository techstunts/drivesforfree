<?php
namespace storageprovider\models;
class googledrive extends storageabstract{
    const CLASS_NAME = 'Google_Client';
    
    public function __construct() {
        $classname = self::CLASS_NAME;
        $this->_provider = new $classname();
        //$this->_provider->addService('drive');
    }
    
}