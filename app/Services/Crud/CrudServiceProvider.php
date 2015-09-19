<?php namespace App\Services\Crud;

use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider {
	
	/**
	 * Register the form builder instance.
	 *
	 * @return void
	 */
	protected function registerCrudFactory()
	{
		$this->app->bindShared('crud', function($app)
		{
			//$crud = new CrudFactory();
		});
	}

}
