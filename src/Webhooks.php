<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Dinero;

class Webhooks
{
    public function subscribe(string $uri = null, string $eventId = null)
    {
        return Dinero::client()
            ->post('/webhooks/subscribe', [
                'uri' => $uri,
                'eventId' => $eventId
            ]);
    }

    public function unsubscribe(string $eventId = null)
    {
        return Dinero::client()
            ->delete('/webhooks/unsubscribe', [
                'eventId' => $eventId
            ]);
    }

    public function subscriptions()
    {
        return Dinero::client()
            ->get('/webhooks/subscriptions');
    }

    public function events()
    {
        return Dinero::client()
            ->get('/webhooks/events');
    }
}
