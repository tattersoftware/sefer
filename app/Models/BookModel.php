<?php namespace App\Models;

use Tatter\Addins\Model;

class BookModel extends Model
{
	protected $table      = 'books';
	protected $primaryKey = 'id';

	protected $returnType = 'object';
	protected $useSoftDeletes = true;

	protected $allowedFields = [
		'title', 'isbn', 'slug',
		'image_cover', 'image_spine', 'image_back'
	];

	protected $useTimestamps = true;

	protected $validationRules    = [
		'title' => 'required|max_length[255]',
		'slug'  => 'required|alpha_dash|max_length[31]',
	];
	protected $validationMessages = [];
	protected $skipValidation     = false;
}
