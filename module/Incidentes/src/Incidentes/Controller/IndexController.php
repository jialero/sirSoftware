<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Incidentes\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Navigation\Navigation;
use Incidentes\Form\FormImportarModulo;
use Incidentes\Model\ValidaArchivo;
use Zend\Validator\File\Size;
use Incidentes\Form\FormCalendario;
use Zend\ProgressBar;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {        
        $this->layout('layout\pepe');
        $form=new FormCalendario('formCalenario');
        $view=new ViewModel(array('form'=>$form));
        return $view;
    }
    
    public function addAction()
    {
        $form = new FormImportarModulo();
        //$form = new FormImportarModulo('upload-form');
        $request = $this->getRequest();  
        if ($request->isPost()) {
             
            $profile = new ValidaArchivo();
            $form->setInputFilter($profile->getInputFilter());
             
            $nonFile = $request->getPost()->toArray();
            //echo ' no archivo <pre>'.print_r($nonFile,TRUE).'</pre>';
            $File    = $this->params()->fromFiles('subirArchivo');
            /*$data = array_merge(
                 $nonFile, //POST 
                 array('subirArchivo'=> $File['name']) //FILE...
             );*/
             
            //if you're using ZF >= 2.1.1  
            // you should update to the latest ZF2 version
            //  and assign $data like the following 
            $data    = array_merge_recursive(
                $this->getRequest()->getPost()->toArray(),           
                $this->getRequest()->getFiles()->toArray()
                );
            //une los elementos de uno o más arrays de modo tal que los valores
            // de uno sean añadidos al final del anterior. Devuelve el array resultante.
            //echo ' array merge<pre>'.print_r($data,TRUE).'</pre>';
            //set data post and file ...    
            $form->setData($data);
            
            //segun la documentacion de zend se recomienda usar
            // Zend\Http\PhpEnvironment\Request para llamar $_FILES
            // y no usarlo directamente ya que en zend se cambia el orden de guardado
            // de archivos, por ejemplo cuando es multiple cambia respecto al nombre
            // y el tipo
            /*if ($form->isValid()) {
                echo ' form->getdata <pre>'.print_r($form->getData(),TRUE).'</pre>';
                $size = new Size(array('min'=>200,'max'=>2000)); //minimum bytes filesize
     
                $adapter = new \Zend\File\Transfer\Adapter\Http(); 
                //validator can be more than one...
                $adapter->setValidators(array($size), $File['name']);

                if (!$adapter->isValid()){
                    $dataError = $adapter->getMessages();
                    $error = array();
                    foreach($dataError as $key=>$row)
                    {
                        $error[] = $row;
                    } //set formElementErrors
                    $form->setMessages(array('subirArchivo'=>$error ));
                } else {
                    //echo "ruta ".dirname(__DIR__);
                    $adapter->setDestination(dirname(__DIR__).'/assets');
                    if ($adapter->receive($File['name'])) {
                        $profile->exchangeArray($form->getData());
                        echo ' upload <pre>'.print_r($profile->fileupload,TRUE).'</pre>';
                    }
                }  
            }*/
            if ($form->isValid())
            {
                $adapter = new \Zend\File\Transfer\Adapter\Http();
                //echo "ruta ".dirname(__DIR__)."<br>";
                $adapter->setDestination(dirname(__DIR__).'/assets');
                if ($adapter->receive($File['name'])) {
                    $profile->exchangeArray($form->getData());
                    //echo ' upload <pre>'.print_r($profile->fileupload,TRUE).'</pre>';
                }
                /*$id = $this->params()->fromQuery('id', null);
                $progress = new \Zend\ProgressBar\Upload\SessionProgress();
                echo "progreso<pre>".print_r($progress->getProgress($id,TRUE))."</pre>";
                $this->params()->fromPost('paramname');   // From POST
                $this->params()->fromQuery('paramname');  // From GET
                $this->params()->fromRoute('paramname');  // From RouteMatch
                $this->params()->fromHeader('paramname'); // From header
                $this->params()->fromFiles('paramname');  // From file being uploaded
                                  
                $data = $form->getData();
                // Form is valid, save the form!
                if (!empty($post['isAjax'])) {
                    return new JsonModel(array(
                        'status'   => true,
                        'redirect' => $this->url()->fromRoute('add'),
                        'formData' => $data,
                    ));
                } else {
                    // Fallback for non-JS clients
                    return $this->redirect()->toRoute('add');
                }
                */
                
                //CODIGO PARA ABRIR EL ARCHIVO SUBIDO
                $file=dirname(__DIR__).'\assets\\'.$profile->fileupload['name'];//dirname devuelve el directorio padre de la ruta
                //echo "esto es file ".$file;
                $rows = array();
                $headers = array();
                $datos= array();
                if(file_exists($file) && is_readable($file)){//Indica si un fichero existe y es legible
                    $handle = fopen($file, 'r');
                    while (!feof($handle) ) {
                        $row = fgetcsv($handle);//lectura de archivos en csv, cuando se coloca sin parametros
                                                //de longitud y delimitador por default toma todo el archivo y delimitador por comas
                        //usar explode para separarlos por ;
                        //echo "linea ".print_r($row,TRUE)."<br>";
                        if(empty($headers))
                            $headers = $row;
                        else if(is_array($row))
                            $rows[] = array_combine($headers, $row);//Crea un nuevo array, usando una matriz para las claves y otra para sus valores
                    }
                    fclose($handle);
                } else {
                    throw new Exception($file.' no existe o no es legible.');
                }
                //echo "<pre>".print_r($rows,TRUE)."</pre>";
            }
            
        }  
        $this->layout('layout/pepe');
        return array('form' => $form);
        
    }
    
    public function uploadprogressAction()
    {
        //$id = $this->params()->fromQuery('id', null);
        
        $id=  $this->request->getPost('id');
        //echo "esto es id:".$id;
        $progress = new \Zend\ProgressBar\Upload\SessionProgress();
        //echo "esto es progres<pre>".print_r($progress->getProgress($id))."<pre>";
        //$view = new \Zend\View\Model\JsonModel(array(
                //'id'     => $id,
          //      'status' => $progress->getProgress($id)
        //));
        //return new ViewModel(array('status' => $progress->getProgress($id)));
        //return new \Zend\View\Model\JsonModel($progress->getProgress($id));
        //return new ViewModel(array('status' => $progress->getProgress($id)));
        $vista=new ViewModel(array('id' => $progress->getProgress($id))); 
        $vista->setTerminal(true);
        return $vista;

    }
    
    public function viewAction()
    {
        // get the article from the persistence layer, etc...

        $view = new ViewModel();

        // this is not needed since it matches "module/controller/action"
        $view->setTemplate('incidentes/index/view');

        $indexView = new ViewModel(array ( 'artículo'  =>  "esto es una prueba" ));
        $indexView->setTemplate('incidentes/index/article');

        $primarySidebarView = new ViewModel();
        $primarySidebarView->setTemplate('incidentes/index/main-sidebar');

        $secondarySidebarView = new ViewModel();
        $secondarySidebarView->setTemplate('incidentes/index/secondary-sidebar');

        $sidebarBlockView = new ViewModel();
        $sidebarBlockView->setTemplate('incidentes/index/block');

        $secondarySidebarView->addChild($sidebarBlockView, 'block');
        $prueba = new ViewModel();
        $prueba->setTemplate('incidentes/index/index');

        $view->addChild($indexView, 'article')
             ->addChild($primarySidebarView, 'sidebar_primary')
             ->addChild($secondarySidebarView, 'sidebar_secondary')
             ->addChild($prueba,'index');
        
        $this->layout('layout/layout');
        
        return $view;
    }
    
    public function origenajaxAction()
    {
        return new ViewModel();        
    }


    public function usuariosAjaxAction()
    {
        /*Comprobamos si la petición es por AJAX
        y si no lo es nos redirige a otra pagina*/
        if($this->request->isXmlHttpRequest()){
            //$this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
            //$usuarios=new UsuariosModel($this->dbAdapter);
            //Llamamos a un metodo del modelo
            //Cargamos la vista usuariosajax.phtml
            $todos="ESTA ES UNA PEQUEÑA PRUEBA AJAX";
            $vista = new ViewModel(array('todos'=>$todos));
            /* Le indicamos que será una vista sin plantilla,
             * es decir, no cargará todo el contenido de la plantilla
             * sino que solo cargará los datos que imprima
             */
            $vista->setTerminal(true);
            return $vista;
        }
        else
        {
            return $this->redirect()->toUrl($this->getRequest()->getBaseUrl());
        }
    }
}
