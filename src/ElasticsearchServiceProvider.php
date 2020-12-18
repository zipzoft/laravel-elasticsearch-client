<?php namespace Zipzoft\Elasticsearch;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class ElasticsearchServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config.php', 'elastic.client');
    }


    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config.php' => $this->app->configPath('elastic.client.php'),
            ], 'config');
        }

        $this->app->singleton(Client::class, function($app) {
            return ClientBuilder::fromConfig($app['config']->get('elastic.client'));
        });
    }
}