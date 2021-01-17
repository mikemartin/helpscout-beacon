<?php

namespace Mikemartin\HelpscoutBeacon;

use Statamic\Providers\AddonServiceProvider;

class HelpscoutBeaconServiceProvider extends AddonServiceProvider
{
  protected $middlewareGroups = [
      'statamic.cp' => [
          HelpscoutBeaconMiddleware::class,
      ],
  ];

  public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'helpscout');

        $this->publishes([
          __DIR__.'/../config/helpscout.php' => config_path('helpscout.php'),
      ], 'config');
    }
}
