<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Ajax\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Ajax\Model\ValidaFormulario,
    Ajax\Model\FormAjax;

class AjaxController extends AbstractActionController
{
    /*protected function getForm()
    {
        $builder    = new AnnotationBuilder();
        $entity     = new FormAjax();
        $form       = $builder->createForm($entity);
         
        return $form;
    }*/  
    protected function getForm()
    {
       return new FormAjax();
    }    
    
    public function ajaxAction()
    {
        return new ViewModel();
    }
    
    public function showformAction()
    {
        $viewmodel = new ViewModel();
        $form      = $this->getForm();
        $request   = $this->getRequest();
         
        //disable layout if request by Ajax
        $viewmodel->setTerminal($request->isXmlHttpRequest());
         
        $is_xmlhttprequest = 1;
        if ( ! $request->isXmlHttpRequest()){
            //if NOT using Ajax
            $is_xmlhttprequest = 0;
            if ($request->isPost()){
                $form->setData($request->getPost());
                $formValidador = new ValidaFormulario();
                $form->setInputFilter($formValidador->getInputFilter());
                echo "es valido: "."<pre>".print_r($form->isValid(),true)."</pre>";
                if($form->isValid())
                {
                    //save to db <span class="wp-smiley wp-emoji wp-emoji-wink" title=";)">;)</span>
                    echo "son válidos los datos";
                    //$this->savetodb($form->getData());
                }
            }
        }
         
        $viewmodel->setVariables(array(
                    'form' => $form,
                    // is_xmlhttprequest is needed for check this form is in modal dialog or not
                    // in view
                    'is_xmlhttprequest' => $is_xmlhttprequest
        ));
         
        return $viewmodel;
    }
     
    public function validatepostajaxAction()
    {
        $form    = $this->getForm();
        $request = $this->getRequest();
        $response = $this->getResponse();
         
        $messages = array();
        if ($request->isPost()){
            $form->setData($request->getPost());
            $formValidador = new ValidaFormulario();
            $form->setInputFilter($formValidador->getInputFilter());
            echo "es valido2: "."<pre>".print_r($form->isValid(),true)."</pre>";
            if ( ! $form->isValid()) {
                $errors = $form->getMessages();
                foreach($errors as $key=>$row)
                {
                    if (!empty($row) && $key != 'enviar') {
                        foreach($row as $keyer => $rower)
                        {
                            //save error(s) per-element that
                            //needed by Javascript
                            $messages[$key][] = $rower;    
                        }
                    }
                }
            }
             
            if (!empty($messages)){        
                $response->setContent(\Zend\Json\Json::encode($messages));
            } else {
                //save to db <span class="wp-smiley wp-emoji wp-emoji-wink" title=";)">;)</span>
                echo "son válidos los datos";
                //$this->savetodb($form->getData());
                $response->setContent(\Zend\Json\Json::encode(array('success'=>1)));
            }
        }
         
        return $response;
    }    
}
