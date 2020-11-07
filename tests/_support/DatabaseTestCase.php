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
		$runner = Services::migrations(config('Migrations'), db_connect('wordpress'));
		$runner->setSilent(false);
		$runner->setNamespace('Tests\Support');
		$runner->regress(0, 'wordpress');
		$runner->latest('wordpress');
	}
}
