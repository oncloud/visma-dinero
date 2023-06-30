<?php

namespace OnCloud\Dinero;

use Illuminate\Support\Facades\Http;

class Dinero
{
    public static $baseUrl = 'https://api.dinero.dk/v1/';
    public function client()
    {
        return Http::withToken('')
            ->baseUrl(self::$baseUrl. config('dinero.organization_id'));
    }
}
