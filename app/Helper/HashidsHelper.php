<?php

use Hashids\Hashids;

if (!function_exists('encodeId')) {
    function encodeId($id) {
        $key = env('HASHIDS_SALT') ?: 'fallback_key';
        $hashids = new Hashids($key, 6);
        return $hashids->encode($id);
    }
}

if (!function_exists('decodeId')) {
    function decodeId($hash) {
        $key = env('HASHIDS_SALT') ?: 'fallback_key';
        $hashids = new Hashids($key, 6);
        return $hashids->decode($hash)[0] ?? null;
    }
}
