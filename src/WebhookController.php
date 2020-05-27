<?php

namespace Medspec\WebhookClient;

use Illuminate\Http\Request;

class WebhookController
{
    public function __invoke(Request $request, WebhookConfig $config)
    {
        return (new WebhookProcessor($request, $config))->process();
    }
}
