<?php

namespace Crankd\LaravelHeroIcons;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelHeroIconsServiceProvider extends ServiceProvider
{

    private const CONFIG_FILE = __DIR__ . '/../config/heroicons.php';

    private const PATH_VIEWS = __DIR__ . '/../resources/views';

    private const PATH_ASSETS = __DIR__ . '/../resources/js';

    private const SVG_ASSETS = __DIR__ . '/../resources/svg';

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        if (function_exists('config_path')) {
            $this->publishes([
                self::CONFIG_FILE => config_path('heroicons.php'),
            ], 'heroicons-config');
        }

        $this->loadViewsFrom(self::PATH_VIEWS, 'heroicons');
        $this->registerComponents();

        $this->publishes([
            self::PATH_ASSETS => public_path('crankd/laravel-heroicons/js'),
            self::SVG_ASSETS => public_path('crankd/laravel-heroicons/svg'),
        ], 'heroicons-helper');

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(self::CONFIG_FILE, 'heroicons');
    }

    /**
     * Register the Blade form components.
     *
     * @return $this
     */
    private function registerComponents(): self
    {
        Blade::componentNamespace('Crankd\\LaravelHeroIcons\\View\\Components', 'heroicon-helper');

        Blade::componentNamespace('Crankd\\LaravelHeroIcons\\View\\Components\\HeroIcon', config('heroicons.prefix.heroicon'));
        return $this;
    }

}
