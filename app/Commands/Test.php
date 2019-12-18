<?php namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Test extends BaseCommand
{
    protected $group       = 'Test';
    protected $name        = 'test';
    protected $description = 'Does various quick test functions.';

    public function run(array $params)
    {
		echo site_url('api') . PHP_EOL;
	}
}
