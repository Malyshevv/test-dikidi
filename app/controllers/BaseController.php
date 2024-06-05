<?php
namespace App\Controllers;

use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;

class BaseController {
	public Container $container;
	/**
	 * @var mixed|\view
	 */
	public mixed $view;

	/**
	 * @throws DependencyException
	 * @throws NotFoundException
	 */
	public function __construct(Container $container)
	{
		$this->view = $container->get('view');
		$this->container = $container;
	}

}