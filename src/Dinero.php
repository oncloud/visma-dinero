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
        return Http::withToken('eyJhbGciOiJSUzI1NiIsImtpZCI6IjM5QTlGRUJDQUM2QTM3RjE3MUI1NkY3QTI0OTBCRTU1N0QxMjIyOEFSUzI1NiIsIng1dCI6Ik9hbi12S3hxTl9GeHRXOTZKSkMtVlgwU0lvbyIsInR5cCI6ImF0K0pXVCJ9.eyJpc3MiOiJodHRwczovL2Nvbm5lY3QudmlzbWEuY29tIiwibmJmIjoxNjg4NjU2OTU5LCJpYXQiOjE2ODg2NTY5NTksImV4cCI6MTY4ODY2MDU1OSwiYXVkIjoiaHR0cHM6Ly9hcGkuZGluZXJvLmRrIiwic2NvcGUiOlsiZGluZXJvcHVibGljYXBpOnJlYWQiLCJkaW5lcm9wdWJsaWNhcGk6d3JpdGUiLCJvZmZsaW5lX2FjY2VzcyJdLCJhbXIiOlsicHdkIl0sImNsaWVudF9pZCI6Imlzdl90ZXN0b2MiLCJzdWIiOiI5NmFhYjQ4ZS0xMjkzLTQ2NmEtYTY4ZS05MGQ2YmEyZTIyMWEiLCJhdXRoX3RpbWUiOjE2ODg2NTY5NTMsImlkcCI6IlZpc21hIENvbm5lY3QiLCJsbHQiOjE2ODgzMjg5ODQsImNyZWF0ZWRfYXQiOjE2NTk4MjMyNTksImFjciI6IjIiLCJzaWQiOiIwOGM5Y2VkNC03YzE3LTUxNjktYTVjZC03MjlmZTAzZjIxNmYifQ.YdSr-Lsr-1xsPTB56R9O2gztE6h0_k2EAeyKeLinR_XRKQ3evqaGsau02NAPewT04X0v6cX_F9HYngfL7c0bb1a60UYcMOUVlMHUhXysfsUUOOKOPfiYOBGpkw7fj-B81PxlfkjdXV_0g0O4ztf16qk-at95DK__sJUKzHdsOFE7ckKUOoOx87P4KCXxt96SpqX5g-bUBI5uq2aNUFCfN1f6JXIsXw23cdmlJggOtBUgurNakkoeNMARP4y8Emm9U78lMy-4XsTq_gZfpg3W_-q0rp5m3ZEeB3E9zFhXwROLd0kst7ttVY6Zl-ZMyVN6QygJ4_3K51qw2lU4sQxKHw')
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
        return Http::asForm()
            ->withHeader('Content-Type', 'application/x-www-form-urlencoded')
            ->post('https://connect.visma.com/connect/token', [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => 'http://localhost/dinero/callback',
                'client_id' => config('dinero.client_id'),
                'client_secret' => config('dinero.client_secret'),
            ])->json();
    }
}
