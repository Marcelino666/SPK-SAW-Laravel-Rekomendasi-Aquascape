<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;

class DropboxServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Storage::extend('dropbox', function ($app, $config) {
        //     $client = new DropboxClient ( 
        //         $config['authorizationToken']
        //     );
        //     // return new Filesystem(new DropboxAdapter($client));
        //     $adapter = new DropboxAdapter($client);
        //     $filesystem = new Filesystem($adapter, ['case_sensitive' => false]);
        //     return $filesystem;
        // });

        Storage::extend('dropbox', function ($app, $config) {
            $client = new DropboxClient(
                // [$config['key'], $config['secret']]
                $config['authorizationToken']
            );
            return new Filesystem(new DropboxAdapter($client));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
