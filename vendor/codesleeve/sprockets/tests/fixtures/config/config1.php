<?php

return array(
	'environment' => 'local',

	'routing' => array(
		'prefix' => '/assets'
	),

	'paths' => array(
		'app/assets/javascripts',
		'app/assets/stylesheets',
		'lib/assets/javascripts',
		'lib/assets/stylesheets',
		'provider/assets/javascripts',
		'provider/assets/stylesheets'
	),

	'filters' => array(
		'.min.js' => array(),
		'.js' => array(),
		'.min.css' => array(),
		'.css' => array(),
		'.js.coffee' => array(),
		'.css.less' => array(),
		'.css.scss' => array(),
		'.html' => array()
	),

	'directives' => array(
		'require ' => new Codesleeve\Sprockets\Directives\RequireFile,
		'require_directory' => new Codesleeve\Sprockets\Directives\RequireDirectory,
		'require_tree' => new Codesleeve\Sprockets\Directives\RequireTree,
		'require_self' => new Codesleeve\Sprockets\Directives\RequireSelf,
	),

	'mimes' => array(
	    'javascripts' => array('.js', '.js.coffee', '.min.js', '.html'),
	    'stylesheets' => array('.css', '.css.less', '.css.scss', '.min.css'),
	),

	'cache' => null,
	
	'concat' => array('production'),

	'sprockets_filter' => 'Codesleeve\Sprockets\SprocketsFilter',

	'sprockets_filters' => array(
		'javascripts' => array(),
		'stylesheets' => array(),
	),
);
