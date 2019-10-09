<?php namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;

class BaseController extends ResourceController
{
	protected function formValidationFail()
	{
		$status  = 422;
		$message = 'Validation Failed';
		
		$response = [
			'status'   => $status,
			'error'    => $message,
			'messages' => $this->model->errors(),
		];
		
		return $this->respond($response, $status, $message);
	}
}
