<?php

namespace Medspec\WebhookClient\WebhookResponse;

use Illuminate\Http\Request;
use Medspec\WebhookClient\WebhookConfig;
use Symfony\Component\HttpFoundation\Response;

class DefaultRespondsTo implements RespondsToWebhook
{
    public function respondToValidWebhook(Request $request, WebhookConfig $config): Response
    {
        return response()->json(['message' => 'ok']);
    }
}
