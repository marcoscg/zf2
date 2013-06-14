<?php

namespace Usuario\Filter;

use Zend\InputFilter\InputFilter,
    Zend\InputFilter\Factory,
    Zend\InputFilter\InputFilterAwareInterface,
    Zend\InputFilter\InputFilterInterface;

class Usuario implements InputFilterAwareInterface {    
    
    public function getInputFilter() {
    
        $inputFilter = new InputFilter();
        $factoty = new Factory();
        
        $inputFilter->add($factoty->createInput(array( 
            'name'     => 'nome',
            'required' => true,
            'filters'  => array(
                array('name' => 'Zend\Filter\StripTags'),
                array('name' => 'Zend\Filter\StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'     => 'Zend\Validator\NotEmpty',
                    'options'  => array(
                        'messages' => array('isEmpty' => 'O campo não pode ficas vazio.'),
                    ),                    
                ),
            ),
        )));
        
        $stripTags = new \Zend\Filter\StripTags();
        $stringTrim = new \Zend\Filter\StringTrim();
        
        $notEmpty = new \Zend\Validator\NotEmpty();
        $emailAddress = new \Zend\Validator\EmailAddress();
        
        $notEmpty->setMessage('O campo email não pode ser vazio!', \Zend\Validator\NotEmpty::IS_EMPTY);
        $emailAddress->setMessage('O formato do email está inválido!', \Zend\Validator\EmailAddress::INVALID_FORMAT);
                
        $inputFilter->add($factoty->createInput(array( 
            'name'       => 'email',
            'required'   => true,
            'filters'    => array($stripTags, $stringTrim),
            'validators' => array($notEmpty, $emailAddress),
        )));
        
        $inputFilter->add($factoty->createInput(array( 
            'name'     => 'senha',
            'required' => true,
            'filters'  => array(
                array('name' => 'Zend\Filter\StripTags'),
                array('name' => 'Zend\Filter\StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'     => 'Zend\Validator\NotEmpty',
                    'options'  => array(
                        'messages' => array('isEmpty' => 'Senha não pode ser vazio.'),
                    ),                    
                ),
            ),
        )));
        
        $inputFilter->add($factoty->createInput(array( 
            'name'     => 'confirma_senha',
            'required' => true,
            'filters'  => array(
                array('name' => 'Zend\Filter\StripTags'),
                array('name' => 'Zend\Filter\StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'     => 'Zend\Validator\NotEmpty',
                    'options'  => array(
                        'messages' => array('isEmpty' => 'Senha não pode ser vazio.'),
                    ),                 
                ),
                array(
                    'name'     => 'Zend\Validator\Identical',
                    'options'  => array(
                        'token' => 'senha',                        
                    ),                    
                ),
            ),
        )));        
                
        return $inputFilter;
    }

    public function setInputFilter(InputFilterInterface $inputFilter) {
        
    }    
}
