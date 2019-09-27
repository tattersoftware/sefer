<?php namespace Config;

/***
*
* This file contains example values to override or augment default library behavior.
* Recommended usage:
*	1. Copy the file to app/Config/Assets.php
*	2. Set any override variables
*	3. Add additional route-specific assets to $routes
*	4. Remove any lines to fallback to defaults
*
***/

class Assets extends \Tatter\Assets\Config\Assets
{	
	// additional assets to load per route - no leading/trailing slashes
	public $routes = [
		'' => [
			'vendor/vue/vue.js',
			'vendor/bootstrap/bootstrap.min.css',
			'vendor/bootstrap/bootstrap.bundle.min.js',
			'vendor/font-awesome/css/all.min.css',
		],
	];
}
