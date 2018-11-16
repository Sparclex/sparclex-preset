<?php
namespace Sparclex\SparclexPreset;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Console\Presets\Preset as LaravelPreset;

class Preset extends LaravelPreset {
    public static function install()
    {
        static::cleanJsDirectory();
        static::cleanSassDirectory();
        static::updatePackages();
        static::updateMix();
        static::updateScripts();
        static::updateStyles();
        static::copyTailwindConfig();
        static::createComponentsDirectory();
        static::copyDefaultView();
    }

    public static function cleanJsDirectory()
    {
        File::cleanDirectory(resource_path('js'));
    }

    public static function cleanSassDirectory()
    {
        File::cleanDirectory(resource_path('sass'));
    }

    public static function updatePackageArray($packages)
    {
        return array_merge(
            ['tailwindcss' => '*'],
            Arr::except($packages, [
                'popper.js',
                'bootstrap',
                'jquery',
                'lodash',
            ]));
    }

    public static function updateMix()
    {
        copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    public static function updateScripts()
    {
        copy(__DIR__.'/stubs/app.js', resource_path('js/app.js'));
        copy(__DIR__.'/stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }

    public static function updateStyles()
    {
        copy(__DIR__.'/stubs/app.scss', resource_path('sass/app.scss'));
    }

    public static function copyTailwindConfig()
    {
        copy(__DIR__.'/stubs/tailwind.js', base_path('tailwind.js'));
    }

    public static function createComponentsDirectory()
    {
        mkdir(resource_path('js/components'));
    }

    public static function copyDefaultView()
    {
        copy(__DIR__.'/stubs/layout.blade.php', resource_path('views/layout.blade.php'));
    }
}
