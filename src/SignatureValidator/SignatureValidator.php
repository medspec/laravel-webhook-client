<?php

namespace Medspec\WebhookClient\SignatureValidator;

use Illuminate\Http\Request;
use Medspec\WebhookClient\WebhookConfig;

interface SignatureValidator
{
    public function isValid(Request $request, WebhookConfig $config): bool;
}
