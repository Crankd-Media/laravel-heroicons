<?php

namespace Crankd\LaravelHeroIcons;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class HeroIconsServiceProvider extends ServiceProvider
{

    private const CONFIG_FILE = __DIR__ . '/../config/library.php';

    private const PATH_VIEWS = __DIR__ . '/../resources/views';

    private const PATH_ASSETS = __DIR__ . '/../resources/js';

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        if (function_exists('config_path')) {
            $this->publishes([
                self::CONFIG_FILE => config_path('library.php'),
            ], 'config');
        }

        $this->loadViewsFrom(self::PATH_VIEWS, 'heroicons');
        $this->registerComponents();

        $this->publishes([
            self::PATH_ASSETS => public_path('crankd/laravel-heroicons'),
        ]);

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(self::CONFIG_FILE, 'library');
    }

    /**
     * Register the Blade form components.
     *
     * @return $this
     */
    private function registerComponents(): self
    {
        Blade::componentNamespace('Crankd\\LaravelHeroIcons\\View\\Components', 'heroicon-helper');

        Blade::componentNamespace('Crankd\\LaravelHeroIcons\\View\\Components\\HeroIcon', config('library.prefix.heroicon'));
        return $this;
    }

}
