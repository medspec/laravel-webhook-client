<?php

namespace Medspec\WebhookClient\WebhookProfile;

use Illuminate\Http\Request;

class ProcessEverythingWebhookProfile implements WebhookProfile
{
    public function shouldProcess(Request $request): bool
    {
        return true;
    }
}
