<?php

namespace Idecardo\LaravelUIInstaller\Presets;

use Symfony\Component\Filesystem\Filesystem;

class Preset
{
    /**
     * The views that need to be exported.
     *
     * @var array
     */
    protected static $views = [
        'resources/views/auth/login.blade.php' => 'resources/views/auth/login.blade.php',
        'resources/views/auth/passwords/confirm.blade.php' => 'resources/views/auth/passwords/confirm.blade.php',
        'resources/views/auth/passwords/email.blade.php' => 'resources/views/auth/passwords/email.blade.php',
        'resources/views/auth/passwords/reset.blade.php' => 'resources/views/auth/passwords/reset.blade.php',
        'resources/views/auth/register.blade.php' => 'resources/views/auth/register.blade.php',
        'resources/views/auth/verify.blade.php' => 'resources/views/auth/verify.blade.php',
        'resources/views/home.blade.php' => 'resources/views/home.blade.php',
        'resources/views/layouts/app.blade.php' => 'resources/views/layouts/app.blade.php',
    ];

    /**
     * Install the authentication scaffolding.
     *
     * @return void
     */
    public static function auth()
    {
        (new Filesystem)->copy(
            __DIR__.'/../auth/Http/Controllers/HomeController.php',
            getcwd().'/app/Http/Controllers/HomeController.php'
        );

        file_put_contents(
            getcwd().'/routes/web.php',
            file_get_contents(__DIR__.'/../auth/routes.stub'),
            FILE_APPEND
        );
    }

    /**
     * Update the "package.json" file.
     *
     * @param  bool  $dev
     * @return void
     */
    protected static function updatePackages($dev = true)
    {
        if (! file_exists(getcwd().'/package.json')) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(getcwd().'/package.json'), true);

        $packages[$configurationKey] = static::updatePackageArray(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(getcwd().'/package.json', json_encode(
            $packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
        ).PHP_EOL);
    }

    /**
     * Remove the installed node modules.
     *
     * @return void
     */
    protected static function removeNodeModules()
    {
        $filesystem = new Filesystem;

        $filesystem->remove(getcwd().'/node_modules');
        $filesystem->remove(getcwd().'/package-lock.json');
        $filesystem->remove(getcwd().'/yarn.lock');
    }
}
