<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array
(
    /*'navigation' => array(
        'default' => array(
            array(
                 'label' => 'Home',
                 'route' => 'incidentes',
             ),
             array(
                    'label' => 'Page 3',
                    'title' => 'funciona',
                    'route' => 'indexVista'
                ),           
            array(
                    'label' => 'Page crear incidente o abrirlo',
                    'title' => 'abrir incidente',
                    'route' => 'abrir'
                ),
            array(
                'label' => 'Pagina 1',
                'id' => 'home-link',
                'uri' => 'http://www.pau.com.co/',
                ),
            array(
                'label' => 'Pagina 2',
                'uri' => 'http://www.zend-project.com/',
                'order' => 100,
                ),
            array(
                'label' => 'Pagina 3',
                'uri' => 'http://www.google.com.co/'
                ),
            ),
        ),*/

    'service_manager'=>array(
        'factories'=>array(
            'Zend\Db\Adapter'=>'Zend\Db\Adapter\AdapterServiceFactory',
            /*'navigationb'=>'Zend\Navigation\Service\DefaultNavigationFactory',*/
            
        ),
        'aliases' => array(
            'db' => 'Zend\Db\Adapter',
        ),       
    ),
    'db'=>array(
        'driver'=>'Pdo',
        'dsn'=>'mysql:dbname=imagenga_sir;host:localhost',
        'driver_options'=>array(
            PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES \'utf8\''
        ),
    ),     
);
