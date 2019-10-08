<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use CodeIgniter\Honeypot\Exceptions\HoneypotException;

class ApiRedirect implements FilterInterface
{

	/**
	 * Intercepts AJAX requests and checks for a corresponding API controller.
	 *
	 * @param CodeIgniter\HTTP\RequestInterface $request
	 *
	 * @return mixed
	 */
	public function before(RequestInterface $request)
	{
		$path = $request->uri->getPath();
		
		if (strpos($path, 'api') !== false)
		{
			return;
		}
		$path = '/api/' . $path;
		
		$router = service('router');
		$controller = $router->handle($path);
		
		if (class_exists($controller))
		{
			return redirect()->to($path);
		}
	}

	/**
	 * Not implemented
	 *
	 * @param  CodeIgniter\HTTP\RequestInterface  $request
	 * @param  CodeIgniter\HTTP\ResponseInterface $response
	 * @return mixed
	 */
	public function after(RequestInterface $request, ResponseInterface $response)
	{
	
	}

}
