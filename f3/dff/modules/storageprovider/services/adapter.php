<?php
namespace storageprovider\services;
class adapter{
    public function getAdapter($provider){
        $fqn = 'storageprovider\\models\\' . $provider;
        if(class_exists($fqn)){
            return new $fqn;
        }
        return null;
    }
}
