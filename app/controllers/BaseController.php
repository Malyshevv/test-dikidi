<?php
namespace App\Controllers;

use DI\Container;

class BaseController {
	public Container $container;
	/**
	 * @var mixed|\view
	 */
	public mixed $view;

	public function __construct(Container $container)
	{
		$this->view = $container->get('view');
		$this->container = $container;
	}

}