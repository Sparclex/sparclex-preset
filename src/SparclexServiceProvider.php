<?php

namespace Sparclex\SparclexPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class SparclexServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('sparclex', function($command) {
            Preset::install();
            $command->info('Preset applied');
        });
    }
}
