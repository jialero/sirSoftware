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
class FormCalendario extends Form{

	public function __construct($nombre = null) 
        {               
            parent::__construct($nombre);//ejecuta el constructor del padre
                        
            $this->add(array(
                    'name' => 'codigo',
                    'options' => array(
                        'label' => 'Código Calendario(*): '
                    ),
                    'attributes' => array(
                        'type'        => 'number',
                        'class'       => 'form-control',
                        'id'    => 'codigoCalendario',
                        'maxlength'=>11,
                        'placeholder' => 'Código Calendario',
                        'title'=>'Ingrese el código de identificación del calendario',
                        //'pattern'=>'[0-9]{6,20}',
                        //'required'=>'required'//es un campo obligatorio y no debe ser vacío
                    ),
                ));
            
            $this->add(array(
                    'name' => 'descripcion',
                    'options' => array(
                        'label' => 'Descripción corta del calendario(*): '
                    ),
                    'attributes' => array(
                        'type'        => 'text',
                        'class'       => 'form-control',
                        'id'  => 'descripcion',
                        'maxlength'=>30,
                        'placeholder' => 'Descripción corta calendario',
                        'title'=>'Ingrese una descripción corta que identifique el calendario',
                        //'required'=>'required',//es un campo obligatorio y no debe ser vacío
                    ),
                    'filters'=>array(
                        array('name'=> 'StringTrim'), 
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 3,
                            'max' => 30,
                            ),
                        ),
                    ),                
                ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'lunes_inicio',
                'options'=> array(
                        'label'  => 'Lunes_inicio: ',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'lunes_inicio',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'lunes_fin',
                'options'=> array(
                        'label'  => 'Lunes_fin: ',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'lunes_fin',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'martes_inicio',
                'options'=> array(
                        'label'  => 'Martes_inicio:',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'martes_inicio',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'martes_fin',
                'options'=> array(
                        'label'  => 'Martes_fin:',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'martes_fin',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'miercoles_inicio',
                'options'=> array(
                        'label'  => 'Miercoles_inicio: ',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'miercoles_inicio',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'miercoles_fin',
                'options'=> array(
                        'label'  => 'Miercoles_fin:',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'miercoles_fin',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'jueves_inicio',
                'options'=> array(
                        'label'  => 'Jueves_inicio:',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'jueves_inicio',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'jueves_fin',
                'options'=> array(
                        'label'  => 'Jueves_fin:',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'jueves_fin',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'viernes_inicio',
                'options'=> array(
                        'label'  => 'Viernes_inicio:',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'viernes_inicio',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'viernes_fin',
                'options'=> array(
                        'label'  => 'Viernes_fin:',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'viernes_fin',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'sabado_inicio',
                'options'=> array(
                        'label'  => 'Sábado_inicio:',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'sabado_inicio',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'sabado_fin',
                'options'=> array(
                        'label'  => 'Sábado_fin:',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'sabado_fin',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'domingo_inicio',
                'options'=> array(
                        'label'  => 'Domingo_inicio:',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'domingo_inicio',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Time',
                'name' => 'domingo_fin',
                'options'=> array(
                        'label'  => 'Domingo_fin:',
                        'format' => 'H:i:s'
                ),
                'attributes' => array(
                        'class'       => 'form-control',
                        'id' =>'domingo_fin',
                        'min' => '00:00:00',
                        'max' => '23:59:59',
                        'step' => '60', // seconds; default step interval is 60 seconds
                )
            ));
            
            $this->add(array(
                            'name' => 'enviar',
                            'type'  => 'Submit',
                           'options' => array(
                                //'label' => 'Grabar'
                            ),
                            'attributes' => array(
                                'class'       => 'form-control',
                                'value' => 'enviar',
                                'class' => 'btn btn-lg btn-primary btn-block',
                                'id'=>'enviar',
                                //'onClick'=>'enviar'//coloca basura cuando se pone()
                            ),
            ));             
            
        }
}


?>
