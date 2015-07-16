<?php
namespace Ajax\Model;
use Zend\InputFilter\Factory as InputFilterFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\I18n\Validator\Int;

// Crear nuestra clase filtro, el cual será implementando
// InputFilterAwareInterface si queremos unirlo
// despues al formulario
class ValidaFormulario implements InputFilterAwareInterface {

//Este es el input filter que creamos
protected $inputFilter;

// Este metodo es requerido para la implementación pero
// nos limitaremos a lanzar una excepción en lugar de establecer un filtro de entrada

public function setInputFilter(InputFilterInterface $inputFilter)
{
    throw new \Exception("No establecemos un filtro de entrada.");
}

// Este es el segundo metodo que es requerido por la interface
public function getInputFilter()
{
    // Si nuestro input filter no existe aún creamos uno
    if ($this->inputFilter === null) {
        $inputFilter = new InputFilter();
        // Tambien instanciamos factory asi podemos conseguir más filtros a gusto
        $factory = new InputFilterFactory();
        // Vamos a añadir un filtro para nuestro nombre de elemento en nuestra forma
        
        $inputFilter->add($factory->createInput(
                array(
                    'name' => 'campo',
                    'required'=>true,
                    'filters' => array(
                        // Ahora aseguramos de que no existan valores de etiquetas para ataques de hacks
                        array('name' => 'StripTags'),
                        // Queremos asegurarnos de que los string no tengan espacios ni al inicio ni al final
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array (
                            // Vamos a chequear la longitud del string recibido
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => '6',
                                'max' => '30',
                                ),
                            ),
                        ),                    
                    )));
       
        // establezca la propiedad
        $this->inputFilter = $inputFilter;
    }
    // AL final del metodo, retornamos nuestro input filter creado
    return $this->inputFilter;
}   

}
?>
