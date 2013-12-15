<?php

namespace Custom;
 
use Custom\Model\Ubuntu;
use Custom\Model\UbuntuTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module{
 
    public function getConfig(){
 
        return require __DIR__ . "/config/module.config.php";
 
    }
 
    public function getAutoloaderConfig(){
 
        return array(
 
            'Zend\Loader\StandardAutoloader' => array(
 
                'namespaces' => array(
 
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
 
                )
            )
        );
    }
    
    
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Custom\Model\UbuntuTable' =>  function($sm) {
                    $tableGateway = $sm->get('UbuntuTableGateway');
                    $table = new UbuntuTable($tableGateway);
                    return $table;
                },
                'UbuntuTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Ubuntu());
                    return new TableGateway('ubuntu', $dbAdapter, NULL, $resultSetPrototype);
                },
            ),
        );
    }
 
}