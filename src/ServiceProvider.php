<?php

namespace AmbienteLaravel;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Pagination\Paginator;

class ServiceProvider extends LaravelServiceProvider
{
    public function register()
    {
		if(env('APP_URL') {
			$this->handlePaginationUrls()
		}
    }
	
	private function handlePaginationUrls()
	{
		Paginator::currentPathResolver(function () {
            return (env('APP_URL') . '/' . $this->app['request']->path());
        });
	}

    public function boot()
    {
        if(env('APP_URL') {
			$this->handleBaseUrl();
		}
    }
	
	private function handleBaseUrl()
	{
		URL::forceRootUrl(env('APP_URL'));
		URL::forceScheme(str_contains(env('APP_URL'), 'https') ? 'https' : 'http');
	}
}
?>
