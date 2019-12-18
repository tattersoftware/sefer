<?php namespace ProjectTests\Support\Database\Seeds;

use App\Models\BookModel;
use CodeIgniter\Database\Seeder;

class TestSeeder extends Seeder
{
	public function run()
	{
		// Books
		$rows = [
			[
				'slug'        => 'clark',
				'title'       => 'Etymological Dictionary of Biblical Hebrew',
				'isbn'        => '1-58330-431-2',
				'image_cover' => 'assets/images/books/clark.png',
			],
			[
				'slug'        => 'tower7',
				'title'       => 'The Dark Tower VII: The Dark Tower',
				'isbn'        => '0743254562',
				'image_cover' => 'assets/images/books/tower7.png',
			],
			[
				'slug'        => 'alien',
				'title'       => 'How to Cook Humans',
				'isbn'        => '19',
			],
		];
		
		$model = new BookModel();		
		foreach ($rows as $row)
		{
			if (! $model->where('slug', $row['slug'])->first())
			{
				$model->insert($row);
			}
		}
	}
}
