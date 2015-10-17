<?php 

namespace Zhuayi\BaseAdmin;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class BaseAdminServiceProvider extends LaravelServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {

        $this->publishes([
            __DIR__.'/config/entrust.php' => config_path('entrust.php'),
        ]);

        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('/migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/database/seeds/' => database_path('/seeds'),
        ], 'seeds');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/admin'),
        ]);

        $this->publishes([
             __DIR__.'/public' => public_path('/'),
        ], 'public');

        include __DIR__.'/routes.php';
        // $this->handleConfigs();
        // $this->handleMigrations();
        // $this->handleViews();
        // $this->handleTranslations();
        // $this->handleRoutes();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        // Bind any implementations.

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

}