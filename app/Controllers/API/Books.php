<?php namespace App\Controllers\API;

class Books extends BaseController
{	
	protected $modelName = 'App\Models\BookModel';
	protected $format    = 'json';
	
	public function index()
	{
		return $this->respond($this->model->findAll());
	}
	
	public function show($id = null)
	{
		return $this->respond([$this->model->find($id)]);
	}
	
	public function create()
	{
		$data = $this->request->getPost();

		if (! $id = $this->model->insert($data))
		{
			return $this->formValidationFail();
		}
		
		$book = $this->model->find($id);
		return $this->respondCreated(null, lang('Books.created', [$book->title]));
	}
	
	public function update($id = null)
	{
		$data = $this->request->getPost();

		if (! $this->model->update($id, $data))
		{
			return $this->formValidationFail();
		}
		
		$book = $this->model->find($id);
		return $this->respond(null, 200, lang('Books.updated', [$book->title]));
	}
}
