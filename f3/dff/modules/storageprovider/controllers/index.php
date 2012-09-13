<?php
namespace storageprovider\controllers;
use storageprovider as S;
class index{
    public function init() {
            require_once 'service/Google_Model.php';
            require_once 'service/Google_Service.php';
            require_once 'service/Google_ServiceResource.php';
            require_once 'contrib/Google_DriveService.php';
            require_once 'contrib/Google_Oauth2Service.php';
    }
    public function index() {
        $adapter = new S\services\adapter();
        $client = $adapter->getAdapter('dropbox');
        var_dump($client->testGetAccountInfo());
        $client->getFolderContents();
        
    }
    public function indexGoogleDrive() {
        $this->init();
        $adapter = new S\services\adapter();
        $client = $adapter->getAdapter('googledrive');
        
        $client->setUseObjects(true);
        $client->setAuthClass('Google_Oauth2Service');
        
        $client->setScopes(array('https://www.googleapis.com/auth/drive.file'));
        $_GET['code'] = ''; 
        if(!$_GET['code']){
            print ($client->createAuthUrl(array('https://www.googleapis.com/auth/drive.file'))); 
        }
        //$gdrive->authenticate();
    }
}