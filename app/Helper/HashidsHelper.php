<?php

use Hashids\Hashids;

if (!function_exists('encodeId')) {
    function encodeId($id) {
        $hashids = new Hashids(env('APP_KEY'), 6);
        return $hashids->encode($id);
    }
}

if (!function_exists('decodeId')) {
    function decodeId($hash) {
        $hashids = new Hashids(env('APP_KEY'), 6);
        return $hashids->decode($hash)[0] ?? null;
    }
}
