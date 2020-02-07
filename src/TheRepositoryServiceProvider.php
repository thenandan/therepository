<?php

namespace TheNandan\TheRepository;

use Illuminate\Support\ServiceProvider;
use TheNandan\TheRepository\Console\Commands\MakeRepositoryCommand;

/**
 * Class TheRepositoryServiceProvider
 * @package TheNandan\TheRepository
 */
class TheRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     * @return void
     */
    public function register()
    {
        // Register commands
        $this->registerCommands();
    }

    /**
     *
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/therepository.php', 'therepository.config');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'therepository');
    }

    /**
     * This method register the console commands during the application boot process.
     */
    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeRepositoryCommand::class
            ]);
        }
    }

}
