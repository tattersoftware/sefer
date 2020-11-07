<?php namespace Tests\Support\Config;

class Registrar
{
	/**
	 * Overrides the `wordpress` database group to use
	 * a prefixed version of the `tests` group.
	 *
	 * @return array
	 */
	public static function Database(): array
	{
		return [
			'wordpress' => [
				'DSN'      => '',
				'hostname' => '127.0.0.1',
				'username' => '',
				'password' => '',
				'database' => ':memory:',
				'DBDriver' => 'SQLite3',
				'DBPrefix' => 'wp_',
				'pConnect' => false,
				'DBDebug'  => (ENVIRONMENT !== 'production'),
				'charset'  => 'utf8',
				'DBCollat' => 'utf8_general_ci',
				'swapPre'  => '',
				'encrypt'  => false,
				'compress' => false,
				'strictOn' => false,
				'failover' => [],
				'port'     => 3306,
			],
		];
	}
}
