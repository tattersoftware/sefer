<?php namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Tatter\WordPress\Models\PostModel;

class PostsList extends BaseCommand
{
	protected $group       = 'WordPress';
	protected $name        = 'posts:list';
	protected $usage       = 'posts:list';
	protected $description = 'Lists current WordPress posts.';

	public function run(array $params)
	{
		foreach (model(PostModel::class)->orderBy('post_title')->find() as $post)
		{
			CLI::write($post->post_title);
		}
	}
}
