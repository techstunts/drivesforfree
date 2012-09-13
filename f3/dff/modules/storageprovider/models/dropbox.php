<?php
namespace storageprovider\models;
class dropbox extends storageabstract{
    protected $oauthClass;
    protected $dropbox;
    
    public function __construct()
    {
        global $config;
        $filename = $config['dropbox_oauth_cache_file'];
        if (!file_exists($filename)) {
            die("Run ./setup first to establish an oauth token!\n\n");
        }
        
        $setup = unserialize(file_get_contents($filename));
        
        require_once THIRD_PARTY_FOLDER . '/dropbox-php/src/Dropbox/autoload.php';
        $this->oauthClass = $setup['class'];
        $oauth = new $this->oauthClass($setup['consumer']['key'], $setup['consumer']['secret']);
        $oauth->setToken($setup['tokens']);
        
        $this->dropbox = new \Dropbox_API($oauth);
    }
    
    public function testGetAccountInfo()
    {
        $response = $this->dropbox->getAccountInfo();
        return $response;
    }
    
    public function getFolderContents($folder = 'dropbox'){
        //$response = $this->dropbox->getFile('scripts/configure_image.sh');
        //$response = $this->dropbox->search('a', $folder);
        $response = $this->dropbox->getMetaData('/', true);
        var_dump($response);
    }
}