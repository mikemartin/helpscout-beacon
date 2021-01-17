<?php

namespace Mikemartin\HelpscoutBeacon;

use Closure;
use Statamic\Facades\User;
use Statamic\Facades\Config;

class HelpscoutBeaconMiddleware
{
    protected $response;

    public function handle($request, Closure $next)
    {
        $this->response = $next($request);

        $content = $this->response->getContent();

        if (($pos = strripos($content, '</body>')) === false) {
            return $this->response;
        }

        $this->injectHelpscoutBeacon($content, $pos);

        return $this->response;
    }

    protected function injectHelpscoutBeacon($content, $pos)
    {
        $beacon = view('helpscout::beacon', [
            'beacon_id' => config('helpscout.beacon_id'),
            'beacon_secret_key' => config('helpscout.beacon_secret_key'),
            'user' => User::current()
        ])->render();

        $this->response->setContent(
            substr($content, 0, $pos) . $beacon . substr($content, $pos)
        );
    }
}