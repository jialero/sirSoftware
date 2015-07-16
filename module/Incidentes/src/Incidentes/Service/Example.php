<?php

namespace Incidentes\Service;
use Zend\ServiceManager\ServiceLocatorAwareInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
class Example implements ServiceLocatorAwareInterface{
    // This is set by our initialization so we don't
    // actually have to do this ourselves probably
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }  
    // Retrieve the service locator, handy if we want to
    // read some configuration
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }  
    public function toCaps($string)
    {
        return strtoupper($string);
    }
}
