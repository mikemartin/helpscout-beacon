<?php

namespace Mikemartin\HelpscoutBeacon;

use Mikemartin\HelpscoutBeacon\Tags\Beacon;
use Illuminate\Support\Facades\View;
use Statamic\Facades\User;
use Statamic\Providers\AddonServiceProvider;
use Statamic\Statamic;

class ServiceProvider extends AddonServiceProvider
{
    protected $scripts = [
        __DIR__.'/../resources/js/cp.js',
    ];

    protected $publishables = [
        __DIR__.'/../resources/js/beacon.js' => 'js/beacon.js',
        __DIR__.'/../resources/js/frontend.js' => 'js/frontend.js',
    ];

    protected $tags = [
        Beacon::class,
    ];

    public function bootAddon()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/helpscout-beacon.php', 'helpscout-beacon');

        $this->publishes([
            __DIR__.'/../config/helpscout-beacon.php' => config_path('helpscout-beacon.php'),
        ], 'helpscout-beacon-config');

        View::composer('statamic::layout', function ($view) {
            if (! $user = User::current()) {
                return;
            }

            if (! config('helpscout-beacon.beacon_id') || ! config('helpscout-beacon.beacon_secret_key')) {
                return;
            }

            Statamic::provideToScript([
                'helpscout' => [
                    'beacon_id' => config('helpscout-beacon.beacon_id'),
                    'beacon_script_url' => Statamic::vendorAssetUrl('helpscout-beacon/js/beacon.js'),
                    'avatar' => $user->avatar(),
                    'user' => [
                        'name' => $user->name(),
                        'email' => $user->email(),
                        'company' => config('app.name'),
                        'website' => config('app.url'),
                        'signature' => hash_hmac('sha256', $user->email(), config('helpscout-beacon.beacon_secret_key')),
                    ],
                ],
            ]);
        });
    }
}
