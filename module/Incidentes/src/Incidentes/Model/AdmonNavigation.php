<?php
namespace Incidentes\Model;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Navigation\Service\DefaultNavigationFactory;
use Incidentes\Model\Menu;

class AdmonNavigation extends DefaultNavigationFactory
{
    private $paginas;
    
    /*  
    protected function getName()
    {
        return 'admin';
    }*/   
    
    protected function getPages(ServiceLocatorInterface $serviceLocator)
    {
        $navigation = array();       
        if (null === $this->pages) {
            // referencia a la tabla
            // En este caso obtiene los datos de la clase AbstractTable de Menu
            $this->paginas = $serviceLocator->get('menu')->obtenerPaginas();        
            
            foreach($this->paginas as $key=>$row)
            {                
                $configuration[] = array(
                    'label' => $row['NOMBRE'],
                    'uri' => $row['TEMPLATE'],
                    'pages' => array(
                        array(
                            'label' => 'Page 2.1',
                            'action' => 'page2_1',
                            'controller' => 'page2',
                            'class' => 'special-one',
                            'title' => 'This element has a special class',
                            'active' => true,
                        ))
                );
            }                        
            /*if ($this->paginas) 
            { // ResultSet
                foreach ($this->paginas as $key => $page) { 
                    $navigation[] = array(
                        'label' => $page->label,
                        'uri'   => $page->url_string
                    ); 
                }
            }

        /*if (null === $this->pages) {
            $navigation[] = array (
                'label' => 'Jaapsblog.nl',
                'uri'   => 'http://www.jaapsblog.nl'
            );
            
            $navigation[] = array (
                'label' => 'Page crear incidente o abrirlo',
                'title' => 'abrir incidente',
                'route' => 'abrir'
            );*/
            echo "<pre><p>NAVEGACION</p>".print_r($configuration,true)."</pre>";
            $application = $serviceLocator->get('Application');
            $routeMatch  = $application->getMvcEvent()->getRouteMatch();
            $router      = $application->getMvcEvent()->getRouter();
            //$pages       = $this->getPagesFromConfig($configuration['navigation'][$this->getName()]); 
            $pages       = $this->getPagesFromConfig($configuration); 
            $this->pages = $this->injectComponents($pages, $routeMatch, $router);            
        }

        return $this->pages;
    }
}

?>
