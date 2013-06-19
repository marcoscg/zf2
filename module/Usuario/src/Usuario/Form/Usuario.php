<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Usuario\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;

/**
 * Description of Usuario
 *
 * @author Marcos
 */
class Usuario extends Form {
    //put your code here
    public function __construct($name = null, $options = array()) {
        
        parent::__construct('usuario', $options);  
        
        $this->setAttribute('class', 'form-horizontal');
        
        //Nome
        $nome = new Text();
        $nome->setName('nome')->setAttribute('placeholder', 'Entre com o seu nome');
        //Email
        $email = new \Zend\Form\Element\Text();
        $email->setName('email')->setAttribute('placeholder', 'Informe um email válido.');
        //Senha
        $senha = new \Zend\Form\Element\Password();
        $senha->setName('senha');
        //Confirmar Senha
        $confirmasenha = new \Zend\Form\Element\Password();
        $confirmasenha->setName('confirma_senha');
        //Enviar
        $enviar = new \Zend\Form\Element\Submit('enviar');
        $enviar->setAttribute('value', 'Enviar');
        
        //Add no Formulario
        $this->add($nome);
        $this->add($email);
        $this->add($senha);
        $this->add($confirmasenha);
        $this->add($enviar);
        
        
    }
}

?>
