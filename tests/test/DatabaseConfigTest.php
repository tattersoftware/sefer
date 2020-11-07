<?php

use Tatter\WordPress\Entities\Post;
use Tatter\WordPress\Models\PostModel;
use Tests\Support\DatabaseTestCase;

class DatabaseConfigTest extends DatabaseTestCase
{
	/**
	 * @var PostModel
	 */
	protected $model;

	protected function setUp(): void
	{
		parent::setUp();

		$this->model = new PostModel();
	}

	public function testCanConnectTests()
	{
		$expected = [
			'db_migrations',
			'db_settings',
			'db_outbox_emails',
		];

		$result = db_connect('tests')->listTables(true);

		$this->assertEquals($expected, array_intersect($expected, $result));
	}

	public function testCanConnectWordPress()
	{
		$db = db_connect('wordpress');

		$result = $db->listTables(true);

		$this->assertEquals(['wp_posts', 'wp_postmeta'], array_values($result));
	}
}
