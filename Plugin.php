<?php namespace JD\DingoApi;

use System\Classes\PluginBase;

/**
 * DingoApi Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = ['RainLab.User'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'DingoApi',
            'description' => 'Dingo API implemention with RainLab.User',
            'author'      => 'JD',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
        $this->app['config']['api'] = require __DIR__ . '/config/api.php';

        $this->app->register(\Dingo\Api\Provider\LaravelServiceProvider::class);

        $this->app->singleton('jd.dingoapi.auth', function() {
            return \JD\DingoApi\Classes\AuthManager::instance();
        });
    }
}
