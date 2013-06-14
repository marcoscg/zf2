<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Pais\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;

class PaisController extends AbstractActionController
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;
    
    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }
 
    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }    
    
    public function indexAction()
    {
       
    }

    public function addAction()
    {
        
    }

    public function editAction()
    {

    }

    public function deleteAction()
    {

    }
}
?>
