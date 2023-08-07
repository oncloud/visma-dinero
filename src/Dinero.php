<?php

namespace OnCloud\Dinero;

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
        return Http::withToken(config('dinero.access_token'))
            ->baseUrl(self::$baseUrl.$apiVersion.'/'.config('dinero.organization_id'));
    }

    /**
     * Make a function to get a link for the user to login to Dinero.
     *
     * @return string
     */
    public function authenticate()
    {
        return redirect('https://connect.visma.com/connect/authorize?client_id='.config('dinero.client_id').'&response_mode=form_post&response_type=code&scope=dineropublicapi:read+dineropublicapi:write+offline_access&redirect_uri='.config('dinero.redirect_url', 'http://localhost/dinero/callback').'&ui_locales=da-DK');
    }

    /**
     * Exchange the code for an access token.
     *
     * @return array
     */
    public function getAccessToken(string $code)
    {
        $access =  Http::asForm()
            ->post('https://connect.visma.com/connect/token', [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => config('dinero.redirect_url'),
                'client_id' => config('dinero.client_id'),
                'client_secret' => config('dinero.client_secret'),
            ])->json();

        config(['dinero.access_token' => $access['access_token']]);
        config(['dinero.refresh_token' => $access['refresh_token']]);
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
