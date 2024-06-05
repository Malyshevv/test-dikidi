<?php
namespace App\Controllers\Home;

use App\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends BaseController
{
	/**
	 * Загрузка страницы / - основной метод для рендера
	 * @param  Request  $request
	 * @param  Response  $response
	 * @return mixed
	 */
	public function index(Request $request, Response $response): mixed
	{
		return $this->view->render($response, 'Home/Home.php', [
			'title' => 'Главная',
		]);

	}
}