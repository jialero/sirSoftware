<?php
namespace Ajax\Model;
use Zend\Form\Form;
use Zend\Captcha;
/**
 * @category Formulario
 * @author Camilo Calderón Tapia
 * @copyright (c) 2015, Sir Software
 * Usado para la creación de una empresa
 */
class FormAjax extends Form{

	public function __construct($nombre = null) 
        {               
            parent::__construct($nombre);//ejecuta el constructor del padre
                        
            $this->setAttribute('enctype','multipart/formdata');//tipo de contenido usado para enviar al server, permite el envio de varios files al server            
            
            $this->add(array(
                'name' => 'campo',
                'options' => array(
                    //'label' => 'Cargar modulos con archivo(.csv)  '
                ),
                'attributes' => array(
                    'type'        => 'text',
                    'title'   =>'Ingrese su nombre',
                ),
            ));  
            $this->add(array(
                            'name' => 'enviar',
                            'type'  => 'Submit',
                           'options' => array(
                                //'label' => 'Grabar'
                            ),
                            'attributes' => array(
                                'value' => 'Enviar',
                                'class' => 'btn btn-lg btn-primary btn-block',
                            ),
            ));             
            
        }
}