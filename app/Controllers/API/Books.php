<?php namespace App\Controllers\API;

use App\Models\BookModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Books extends ResourceController
{
	use ResponseTrait;
	
	protected $modelName = 'App\Models\BookModel';
	protected $format    = 'json';
	
	public function index()
	{
		return $this->respond($this->model->findAll());
	}
	
	public function new()
	{
		// API forms are for AJAX only
		if (! $this->request->isAJAX())
		{
			return parent::new();
		}

		helper('form');
		return view('books/form');
	}
	
	public function create()
	{
		$data = $this->request->getPost();
		if (! $id = $this->model->insert($data))
		{
			return $this->failValidationError('Bad Request', null, implode('. ', $this->model->errors()));
		}
		
		$book = $this->model->find($id);
		return $this->respond(null, $this->codes['created'], lang('Books.created', [$book->title]));
	}
	
	public function edit($id = null)
	{
		// API forms are for AJAX only
		if (! $this->request->isAJAX())
		{
			return parent::edit();
		}
		
		$book = $this->model->find($id);
		if (empty($book))
		{
			return $this->respond(null, $this->codes['resource_not_found'], lang('Books.notFound'));
		}
		
		helper('form');
		$data = ['book' => $book];

		return view('books/form', $data);
	}
}
