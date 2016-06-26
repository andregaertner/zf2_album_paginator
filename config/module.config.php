<?php
return array(
	/**
	 * config Controller
	 */
	'controllers' => array(
		'invokables' => array(
			'Album\Controller\Album' => 'Album\Controller\AlbumController',
		),
	),

     /**
	 * config Routing
	 */
     'router' => array(
         'routes' => array(
             'album' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/album[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Album\Controller\Album',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),
	
	/**
	 * config Services
	 */
	'service_manager' => array(
		'factories' => array(
			'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory', // create Service Navigation
		),
	),
	
	/**
	 * config Navigation
	 */
	'navigation' => array(
		'default' => array(
			array(
				'label' => 'Album',
				'route' => 'album',
			),
		),
	),

	/**
	 * config View Manager
	 */
	'view_manager' => array(
		'template_path_stack' => array(
			'album' => __DIR__ . '/../view',
		),
	),
);