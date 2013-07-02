<?php

namespace Usuario\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

/**
 * Description of IndexController
 *
 * @author Isaac Henrique
 */
class IndexController extends AbstractActionController
{
    public function registerAction()
    {
        $olaMundo = 'Oi Mundo';
        return new ViewModel(array(
            'olaMundo' => $olaMundo,
        ));        
    }  
}

?>
