<?php namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\Controller;

class Books extends BaseController
{
	public function __construct()
	{
		$this->model = new BookModel();
	}
	
	public function index()
	{
		$data = ['books' => $this->model->findAll()];
		return view('books/index', $data);
	}
	
	public function new()
	{
		helper('form');
		return view('books/new');
	}
	
	public function edit($bookId)
	{
		$book = $this->model->find($bookId);
		if (empty($book))
		{
			alert('danger', lang('Books.notFound'));
			return redirect()->back();
		}
		
		helper('form');
		$data = ['book' => $book];

		return view('books/edit', $data);
	}
}
