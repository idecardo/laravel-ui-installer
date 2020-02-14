<?php

namespace Idecardo\LaravelUIInstaller\Presets;

use Symfony\Component\Filesystem\Filesystem;

class Tailwind extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::updatePackages();
        static::updateResources();
        static::removeNodeModules();
    }

    /**
     * Install the authentication scaffolding.
     *
     * @return void
     */
    public static function auth()
    {
        parent::auth();

        static::updateAuthResources();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
            'laravel-mix-purgecss' => '^5.0.0-rc.1',
            'tailwindcss' => '^1.2.0',
        ] + $packages;
    }

    /**
     * Update resources files for the application.
     *
     * @return void
     */
    protected static function updateResources()
    {
        $filesystem = new Filesystem;

        $filesystem->copy(__DIR__.'/stubs/tailwind/resources/sass/app.scss', getcwd().'/resources/sass/app.scss', true);
        $filesystem->copy(__DIR__.'/stubs/tailwind/tailwind.config.js', getcwd().'/tailwind.config.js', true);
        $filesystem->copy(__DIR__.'/stubs/tailwind/webpack.mix.js', getcwd().'/webpack.mix.js', true);
    }

    /**
     * Update authentication files for the application.
     *
     * @return void
     */
    protected static function updateAuthResources()
    {
        $filesystem = new Filesystem;

        foreach (static::$views as $key => $value) {
            $filesystem->copy(__DIR__.'/stubs/tailwind/'.$key, getcwd().'/'.$value, true);
        }
    }
}
