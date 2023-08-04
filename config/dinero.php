<?php

// config for OnCloud/Dinero
return [
    'client_id' => env('DINERO_CLIENT_ID'),
    'client_secret' => env('DINERO_CLIENT_SECRET'),
    'organization_id' => env('DINERO_ORGANIZATION_ID'),
    'redirect_url' => 'http://localhost/dinero/callback',
];
