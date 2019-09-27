<?php namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\Controller;

class Books extends BaseController
{
	public __construct()
	{
		$this->model = new BookModel();
	}
	
	public function index()
	{
		$data = ['books' => $this->model->findAll()];
		return view('books/index', $data);
	}
}
