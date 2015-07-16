<?php
namespace Incidentes\Model;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FabricaNavigation implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $navigation = new AdmonNavigation();
        return $navigation->createService($serviceLocator);
    }
}

?>
