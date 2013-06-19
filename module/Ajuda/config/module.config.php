<?php

namespace Ajuda;

return array(
    'controllers' => array(
        'invokables' => array(
            'Ajuda\Controller\Ajuda' => 'Ajuda\Controller\AjudaController',
        ),
    ),
    
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'ajuda' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/ajuda[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Ajuda\Controller\Ajuda',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),    
    
    'view_manager' => array(
        'template_path_stack' => array(
            'ajuda' => __DIR__ . '/../view',
        ),
    ),    
);
