<?php

namespace Usuario\Service;

use Generic\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Generic\Mail\Mail;

/**
 * Description of User
 *
 * @author Isaac Henrique
 */
class User extends AbstractService
{
    protected $transport;
    protected $view;
    
    public function __construct(EntityManager $em, SmtpTransport $transport, $view)
    {
        parent::__construct($em);
        
        $this->transport = $transport;
        $this->view = $view;
    }
    
    public function insert(array $data) 
    {
        $entity = parent::insert($data);
        
        $dataemail = array('nome'=> $data['nome'], 'activationKey'=>$entity->getActivationKey());
        
        if($entity)
        {
            $mail = new Mail($this->transport, $this->view, 'add-user');
            $mail->setSubject('Confirmação de Cadastro')
                    ->setTo($data['email'])
                    ->setData($dataemail)
                    ->prepare()
                    ->send();
            return $entity;
        }
    }
}

?>
