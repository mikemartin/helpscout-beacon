<?php

namespace Mikemartin\HelpscoutBeacon;

use Closure;
use Statamic\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\HtmlString;

class HelpscoutBeaconMiddleware
{
    protected $response;

    public function handle($request, Closure $next)
    {
        $this->response = $next($request);

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
            'beacon_secret_key' => config('helpscout.beacon_secret_key');
        ])->render();

        $this->response->setContent(
            substr($content, 0, $pos) . $beacon . substr($content, $pos)
        );
    }
}