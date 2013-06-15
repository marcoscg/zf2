<?php

namespace Usuario\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

use Usuario\Form\Usuario as UsuarioForm;
use Usuario\Filter\Usuario as UsuarioFilter;

class UsuarioController extends AbstractActionController
{
    
    public function indexAction()
    {
        $olaMundo = 'Oi Mundo';
        
        return new ViewModel(array(
            'olaMundo' => $olaMundo,
        ));        
    }    
    
    public function addAction()
    {
        $usuarioForm = new UsuarioForm();
        $request     = $this->getRequest();
        
        if ($request->isPost()) {            
            $inputFilter = new UsuarioFilter();
            
            $params = $request->getPost()->toArray();
            //\Zend\Debug\Debug::dump($params);
            
            $usuarioForm->setData($params);
            $usuarioForm->setInputFilter($inputFilter->getInputFilter());            
            
            if ($usuarioForm->isValid()) {
                exit('E valido!');
            }
        }
        
        return new ViewModel(array(
            'formUsuario' => $usuarioForm,
        ));        
    }        
    
    public function listAction()
    {
        
    }        
    
    
}
