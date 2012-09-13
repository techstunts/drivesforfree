<?php
namespace oauth2callback\controllers;
class googledrive{
    public function init() {
            require_once 'service/Google_Model.php';
            require_once 'service/Google_Service.php';
            require_once 'service/Google_ServiceResource.php';
            require_once 'contrib/Google_DriveService.php';
    }
    public function authenticate_response() {
        $this->init();
        if($_GET['code']){
            session_start();
            $_SESSION['gdrive_code'] = $_GET['code'];
            
            $client = new \Google_Client();
            $client->setAccessToken($_SESSION['gdrive_code']);
            
            $filename = 'test.php';
            $filetype = 'application/pdf';
            $file = new Google_DriveFile;
            $file->setMimeType($filetype);
            $file->setTitle($filename);
            
            $service = new \Google_DriveService($client);
            $insertedFile = $service->files->insert($file,array('data' => file_get_contents($filename), 'mimeType' => $filetype));
            var_dump($file);
        }
    }
}