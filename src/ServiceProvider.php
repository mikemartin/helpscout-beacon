<?php

namespace Mikemartin\HelpscoutBeacon;

use Illuminate\Support\Facades\View;
use Statamic\Facades\User;
use Statamic\Providers\AddonServiceProvider;
use Statamic\Facades\Site;
use Statamic\Statamic;

class ServiceProvider extends AddonServiceProvider
{

  protected $scripts = [
    __DIR__.'/../resources/js/cp.js',
  ];

  protected $publishables = [
    __DIR__.'/../resources/js/beacon.js' => 'js/beacon.js',
  ];

  public function boot()
    {
        parent::boot();

        View::composer('statamic::layout', function ($view) {
          if (! $user = User::current()) {
              return;
          }

          Statamic::provideToScript(
              [
                'helpscout' => [
                    'beacon_id' => config('helpscout-beacon.beacon_id'),
                    'avatar' => $user->avatar(),
                    'user' => [
                      'name' => $user->name(),
                      'email' => $user->email(),
                      'company' => config('app.name'),
                      'website' => config('app.url'),
                      'signature' => hash_hmac('sha256', $user->email(), config('helpscout-beacon.beacon_secret_key'))
                    ]
                ],
              ]
          );
        });
    }
}
