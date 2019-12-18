<?php namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourcePresenter;

class Books extends ResourcePresenter
{
	use ResponseTrait;
	
	protected $helpers   = ['alerts', 'auth', 'themes'];
	protected $modelName = 'App\Models\BookModel';
	
	public function index()
	{
		$data = ['books' => $this->model->findAll()];
		return view('books/index', $data);
	}
	
	public function show($id = null)
	{
		echo 'standard old show';
	}
	
	public function new()
	{
		helper('form');
		return $this->request->isAJAX() ? view('books/form') : view('books/new');
	}
	
	public function create()
	{
		log_message('debug', 'web create');
		$data = $this->request->getPost();
		if (! $id = $this->model->insert($data))
		{
			foreach ($this->model->errors() as $error)
			{
				alert('warning', $error);
			}
        	return redirect()->back()->withInput();
		}

		$book = $this->model->find($id);
		alert('success', lang('Books.created', [$book->title]));
		
		return redirect()->to('books');
	}
	
	public function edit($id = null)
	{
		$book = $this->model->find($id);
		if (empty($book))
		{
			alert('danger', lang('Books.notFound'));
			return redirect()->back();
		}
		$data = ['book' => $book];
		
		helper('form');
		return $this->request->isAJAX() ? view('books/form', $data) : view('books/edit', $data);
	}
}
