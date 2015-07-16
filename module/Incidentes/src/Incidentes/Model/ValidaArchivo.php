<?php
namespace Incidentes\Model;
use Zend\InputFilter\Factory as InputFilterFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


// Crear nuestra clase filtro, el cual será implementando
// InputFilterAwareInterface si queremos unirlo
// despues al formulario
class ValidaArchivo implements InputFilterAwareInterface {

public $fileupload;
//Este es el input filter que creamos
protected $inputFilter;

public function exchangeArray($data)
    {
        $this->fileupload  = (isset($data['subirArchivo']))  ? $data['subirArchivo']     : null; 
    } 
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
        $inputFilter->add(
                $factory->createInput(array(
                    'name'     => 'subirArchivo',
                    'required' => true,
                    'validators' => array(
                    array (
                        'name'=>'filesize',
                        'options' => array(
                                'min' => '20',
                                'max' => '20000000',
                                ),
                        ),
                    array (
                        'name'=>'fileextension',
                        'options' => array(
                                'csv',
                                'exe',
                                'docx',
                                'doc',
                                'xlsx',
                                'xls',
                                'mp3',
                                'mkv'
                                ),
                        )
                    )
                ))
            );       
       
        // establezca la propiedad
        $this->inputFilter = $inputFilter;
    }
    // AL final del metodo, retornamos nuestro input filter creado
    return $this->inputFilter;
}   

}
?>
