<?php
namespace Incidentes\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Incidentes\Form\FormLogin;
use Incidentes\Form\FormSeleccionarEmpresa;
use Incidentes\Form\FormSeleccionarServicio;



class VistaController extends AbstractActionController {
    
    //private $formLogin;
    //private $urlFormLogin;
    //private $layoutFormLogin;
   
    public function __construct() {
        //$this->formLogin=new FormLogin("Login");
        //$this->urlFormLogin=$this->getRequest()->getBaseUrl();
        //$this->layoutFormLogin=$this->layout('layout/layout');
    }
    
        //asociación con clase formlogin
        public function  loginAction()
        {
            echo "<h1>Entro a Login Controller</h1>";
            //$formLogin=new FormLogin("Login");
            //return $formLogin;
            return new ViewModel(array('form'=>  $this->formLogin));
        }
        
        public function indexAction()
        {
            /*$formLogin=new FormLogin("Login");
            return $formLogin;*/
            return new ViewModel();
   
        }
        

        public function menu2Action()
        {
            /*$validalogin=new ValidaFormulario();
            $recibe=$this->request->getPost();
            $result=$validalogin->isValid($recibe);
            echo "<pre>";
            print_r($validalogin->getMessages());
            echo "</pre>";            
            if($result)
            {
                 $valores=array('titulo'=>'Menú Principal');
            }
            else
            {
                $valores=array('titulo'=>'esta mal');
                //$this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/incidentes/');
            }
            $validaLogin=new ValidacionController();
            $recibe=$this->request->getPost();
            $menu=$validaLogin->validarFormularios(1, $recibe);
            echo "<pre>";
            print_r($menu);
            echo "</pre>";
            if($menu!='1')
            {
               $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/incidentes/vista/index/'.$menu[cedula]); 
            }
            else
            {
                $activo=$validaLogin->autenticarUsuario($recibe);
                if($activo=='si puede ingresar')
                {
                  return new ViewModel(array($menu));  
                }
                
            }*/
        }
        
        public function menu()
        {
            
        }


        public function seleccionarEmpresa($listaEmpresas)
        {
            $formSeleccionarEmpresa = new FormSeleccionarEmpresa("seleccionar_empresa");
            //return $formSeleccionarEmpresa;
            return array("formSeleccionEmpresa"=>$formSeleccionarEmpresa,"lista"=>$listaEmpresas);
        }
        
        public function seleccionarServicios($listaServicios)
        {
            $formSeleccionarServicio = new FormSeleccionarServicio("seleccionar_servicios");
            return array("formSeleccionServicio"=>$formSeleccionarServicio,"lista"=>$listaServicios);        
        }
       

	/*public function formEmpresaAction() {

		$=NULL;

		return($);
	}


	public function formIncidenteAction() {

		$=NULL;

		return($);
	}


	public function formArticuloAction() {

		$=NULL;

		return($);
	}


	public function formEmpresaAction() {

		$=NULL;

		return($);
	}


	public function formUsuarioAction() {

		$=NULL;

		return($);
	}


	public function formTipoUsuarioAction() {

		$=NULL;

		return($);
	}


	public function formContratoAction() {

		$=NULL;

		return($);
	}


	public function formSlaAction() {

		$=NULL;

		return($);
	}


	public function formServicioAction() {

		$=NULL;

		return($);
	}


	public function formCalendarioAction() {

		$=NULL;

		return($);
	}


	public function formTipoDocumento() {

		$=NULL;

		return($);
	}


	public function formTipoSociedad() {

		$=NULL;

		return($);
	}


	public function formTipoServicio() {

		$=NULL;

		return($);
	}


	public function formPeriodoPago() {

		$=NULL;

		return($);
	}


	public function formCiudad() {

		$=NULL;

		return($);
	}*/


}


?>
