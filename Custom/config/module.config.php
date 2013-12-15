<?php

return array(
 
    'view_manager' => array(
 
        'template_path_stack' => array(
 
            __DIR__ . '/../view',
        ),
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        ),
    ),
    'router' => array(
        'routes' => array(
            'crud' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/crud[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Custom\Controller\Crud',
                        'action'     => 'read',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Custom\Controller\Crud' => 'Custom\Controller\CrudController',
        )
    )
);