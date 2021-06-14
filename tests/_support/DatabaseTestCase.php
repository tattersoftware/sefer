<?php namespace Tests\Support;

use App\Database\Seeds\InitialSeeder;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Config\Services;

abstract class DatabaseTestCase extends CIUnitTestCase
{
	use DatabaseTestTrait;

	/**
	 * @var boolean
	 */
	protected $refresh = true;

	/**
	 * @var string|array|null
	 */
    protected $namespace = null;

	/**
	 * The seed file(s) used for all tests within this test case.
	 * Should be fully-namespaced or relative to $basePath
	 *
	 * @var string|array
	 */
	protected $seed = InitialSeeder::class;

	/**
	 * The path to the seeds directory.
	 * Allows overriding the default application directories.
	 *
	 * @var string
	 */
	protected $basePath = APPPATH . 'Database';

	protected function setUp(): void
	{
		parent::setUp();

		// Migrate the `wordpress` group
		$this->migrations->setNamespace('Tests\Support');
		$this->migrations->latest('wordpress');
	}
}
