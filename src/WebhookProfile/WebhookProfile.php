<?php

namespace Medspec\WebhookClient\WebhookProfile;

use Illuminate\Http\Request;

interface WebhookProfile
{
    public function shouldProcess(Request $request): bool;
}
