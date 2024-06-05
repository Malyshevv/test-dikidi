<?php
namespace App\Controllers\FileManager;

use App\Controllers\BaseController;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class FileManagerController extends BaseController
{
	private string|false $baseDir;

	public function __construct(Container $container)
	{
		parent::__construct($container);
		$this->baseDir = realpath('./../public/storage/');
	}

	/**
	 * Загрузка страницы  /file-manager- основной метод для рендера
	 * @param  Request  $request
	 * @param  Response  $response
	 * @return mixed
	 */
	public function index(Request $request, Response $response)
	{
		$currentDir = $request->getQueryParam('dir', '');
		$data = $this->loadDirectory($response, $currentDir);

		return $this->view->render($response, 'FileManager/FileManager.php', [
			'folders' => $data['folders'],
			'files' => $data['files'],
			'title' => 'Файловый менеджер',
			'currentDir' => $currentDir
		]);
	}

	/**
	 * Получения списка папок и файлов
	 * @param $response
	 * @param $currentDir
	 * @return array[]
	 */
	private function loadDirectory($response, $currentDir)
	{
		$directory = realpath($this->baseDir . '/' . $currentDir);
		if (!str_starts_with($directory, $this->baseDir)) {
			return $this->view->render($response, 'Error/403.php');
		}

		$items = array_diff(scandir($directory), array('.', '..'));

		$files = [];
		$folders = [];
		foreach ($items as $item) {
			$path = $directory . '/' . $item;
			if (is_dir($path)) {
				$folders[] = ['name' => $item, 'path' => $currentDir . '/' . $item];
			} elseif (is_file($path) && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $item)) {
				$files[] = $item;
			}
		}

		return [
			'folders' => $folders,
			'files' => $files,
		];
	}
}