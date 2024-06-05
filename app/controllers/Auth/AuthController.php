<?php
namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthController extends BaseController
{
	/**
	 * Загрузка страницы /login - основной метод для рендера
	 * @param  Request  $request
	 * @param  Response  $response
	 * @return mixed
	 */
	public function index(Request $request, Response $response): mixed
	{
		return $this->view->render($response, 'Auth/Login.php', [
			'title' => 'Вход',
		]);

	}
}