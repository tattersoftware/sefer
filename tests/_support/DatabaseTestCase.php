<?php namespace Tests\Support;

use CodeIgniter\Test\CIDatabaseTestCase;
use Config\Services;

class DatabaseTestCase extends CIDatabaseTestCase
{
	/**
	 * @var boolean
	 */
	protected $refresh = true;

	/**
	 * @var string|array|null
	 */
    protected $namespace = null;

	protected function setUp(): void
	{
		parent::setUp();

		// Migrate the `wordpress` group
		$this->migrations->setNamespace('Tests\Support');
		$this->migrations->latest('wordpress');
	}
}
