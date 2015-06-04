<?php

return array(
	'environment' => 'local',

	'routing' => array(
		'prefix' => '/assets'
	),

	'paths' => array(
		'app/assets/javascripts',
		'app/assets/stylesheets',
		'app/assets/images',
		'lib/assets/javascripts',
		'lib/assets/stylesheets',
		'lib/assets/images',
		'provider/assets/javascripts',
		'provider/assets/stylesheets',
		'provider/assets/images'
	),

	'filters' => array(
		'.min.js' => array(),
		'.min.css' => array(),
		'.js' => array(),
		'.js.coffee' => array(),
		'.coffee' => array(),
		'.css' => array(),
		'.css.less' => array(),
		'.css.scss' => array(),
		'.less' => array(),
		'.scss' => array(),
		'.html' => array()
	),

	'directives' => array(
		'require ' => new Codesleeve\Sprockets\Directives\RequireFile,
		'require_directory ' => new Codesleeve\Sprockets\Directives\RequireDirectory,
		'require_tree_df ' => new Codesleeve\Sprockets\Directives\RequireTreeDf,
		'require_tree ' => new Codesleeve\Sprockets\Directives\RequireTree,
		'require_self' => new Codesleeve\Sprockets\Directives\RequireSelf,
		'stub ' => new Codesleeve\Sprockets\Directives\Stub,
		'depend_on ' => new Codesleeve\Sprockets\Directives\DependOn,
		'include ' => new Codesleeve\Sprockets\Directives\IncludeFile,
		'include_directory ' => new Codesleeve\Sprockets\Directives\IncludeDirectory,
		'include_tree' => new Codesleeve\Sprockets\Directives\IncludeTree,
	),

	'mimes' => array(
	    'javascripts' => array('.js', '.js.coffee', '.coffee', '.html', '.min.js'),
	    'stylesheets' => array('.css', '.css.less', '.css.scss', '.less', '.scss', '.min.css'),
	),

	'cache' => 	array('production'),

	'cache_server' => new Codesleeve\Sprockets\Cache\NotCached,

	'cache_client' => new Codesleeve\Sprockets\Cache\NotCached,

	'concat' => array('production'),

	'sprockets_filter' => 'Codesleeve\Sprockets\SprocketsFilter',

	'sprockets_filters' => array(
		'javascripts' => array(),
		'stylesheets' => array(),
	),
);