<?php

namespace Adroit11\LaravelTests;

use Illuminate\Support\ServiceProvider;

class AdroitTestPackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Tests/ArchitectureTests.php' => base_path('tests/Feature/ArchitectureTest.php'),
        ], 'tests');
    }

    public function register()
    {
        // Register any application services.
    }
}

