<?php

namespace OnCloud\Dinero;

use Cache;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class Dinero
{
    public static $baseUrl = 'https://api.dinero.dk/';

    /**
     * @return PendingRequest
     */
    public function client(string $apiVersion = 'v1')
    {
        if(!Cache::has('dinero_access_token')) {
            $this->getAccessToken();
        }

        return Http::withToken(Cache::get('dinero_access_token'))
            ->baseUrl(self::$baseUrl.$apiVersion.'/'.config('dinero.organization_id'));
    }


    /**
     * Exchange the code for an access token.
     *
     * @return array
     */
    public function getAccessToken()
    {
        $access = Http::asForm()
            ->withBasicAuth(config('dinero.client_id'), config('dinero.client_secret'))
            ->post('https://authz.dinero.dk/dineroapi/oauth/token', [
                'grant_type' => 'password',
                'scope' => 'read write',
                'username' => config('dinero.api_key'),
                'password' => config('dinero.api_key'),
            ])->json();

        Cache::add('dinero_access_token', $access['access_token'], $access['expires_in']);
    }

    /**
     * Refresh the access token
     *
     * @return array
     */
    public function refreshToken(string $refreshToken)
    {
        $refresh = Http::asForm()
            ->post('https://connect.visma.com/connect/token', [
                'grant_type' => 'refresh_token',
                'refresh_token' => $refreshToken,
                'client_id' => config('dinero.client_id'),
                'client_secret' => config('dinero.client_secret'),
            ])->json();

        config(['dinero.access_token' => $refresh['access_token']]);
        config(['dinero.refresh_token' => $refresh['refresh_token']]);
    }
}
