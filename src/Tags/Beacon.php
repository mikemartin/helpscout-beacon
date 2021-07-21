<?php

namespace Mikemartin\HelpscoutBeacon\Tags;

use Statamic\Facades\User;
use Statamic\Statamic;
use Statamic\Tags\Tags;

class Beacon extends Tags {

    public function vendor() {
        return "<script src=" . Statamic::vendorAssetUrl("helpscout-beacon/js/beacon.js") . "></script>";
    }

    public function js() {
        if (!($user = User::current())) return null;

        $avatar = $user->avatar();
        $website = config('app.url');
        $userPayload = [
            'name' => $user->name(),
            'email' => $user->email(),
            'company' => config('app.name'),
            'website' => $website,
            'signature' => hash_hmac('sha256', $user->email(), config('helpscout-beacon.public_beacon_secret_key'))
        ];
        if ($avatar) $userPayload['avatar'] = $website + $avatar;

        $payload = [
            'beacon_id' => config('helpscout-beacon.public_beacon_id'),
            'user' => $userPayload
        ];

        $o = "<script>window.__HELPSCOUT_BEACON__=" . json_encode($payload) . "</script>";
        $o .= "\n<script src=" . Statamic::vendorAssetUrl("helpscout-beacon/js/member.js") . "></script>";
        return $o;
    }

    public function boot() {
        parent::boot();
    }
}
