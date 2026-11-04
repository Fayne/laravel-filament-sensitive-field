<?php

namespace Fayne\SensitiveField;

use Illuminate\Support\ServiceProvider;

class SensitiveFieldServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filament-sensitive-field');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'filament-sensitive-field');
    }
}
