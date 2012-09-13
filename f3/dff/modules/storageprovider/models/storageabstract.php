<?php
namespace storageprovider\models;
abstract class storageabstract{
    protected $_provider;
    
    public function __call($name, $arguments) {
        if(method_exists($this->_provider, $name)){
            return call_user_func_array(array($this->_provider, $name), $arguments);
        }
        throw new \Exception('Given method ' . $name . ' doesn\'t exist in class ' . get_class($this->_provider));
    }
    
}
