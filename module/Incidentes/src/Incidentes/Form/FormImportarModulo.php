<?php
namespace Incidentes\Form;
use Zend\Form\Form;
use Zend\Captcha;
/**
 * @category Formulario
 * @author Camilo Calderón Tapia
 * @copyright (c) 2015, Sir Software
 * Usado para importar un archivo csv con los módulos del sw que se dara soporte
 */
class FormImportarModulo extends Form{

	public function __construct($nombre = null) 
        {               
            parent::__construct($nombre);//ejecuta el constructor del padre
                        
            $this->setAttribute('enctype','multipart/form-data');//tipo de contenido usado para enviar al server, permite el envio de varios files al server            
            $this->setAttribute('id', 'progress');
            
            $this->add(array(
                'name' => 'subirArchivo',
                'options' => array(
                    //'label' => 'Cargar modulos con archivo(.csv)  '
                ),
                'attributes'    => array(
                    'type'      => 'file',
                    'id'        => 'subirArchivo',
                    'class'     => 'subirArchivo',
                    'title'     =>'Escoja la ruta donde se encuentra el archivo .csv',
                ),
            )); 
            $this->add(array(
                            'name' => 'importar',
                            'type'  => 'Submit',
                           'options' => array(
                                //'label' => 'Grabar'
                            ),
                            'attributes' => array(
                                'value' => 'Importar Archivo',
                                'class' => 'btn btn-lg btn-primary btn-block',
                                'id'=>'importar',
                                //'onClick'=>'enviar'//coloca basura cuando se pone()
                            ),
            ));             
            
        }
}


?>
