<?php

namespace Medspec\WebhookClient\SignatureValidator;

use Illuminate\Http\Request;
use Medspec\WebhookClient\Exceptions\WebhookFailed;
use Medspec\WebhookClient\WebhookConfig;

class DefaultSignatureValidator implements SignatureValidator
{
    public function isValid(Request $request, WebhookConfig $config): bool
    {
        $signature = $request->header($config->signatureHeaderName);

        if (! $signature) {
            return false;
        }

        $signingSecret = $config->signingSecret;

        if (empty($signingSecret)) {
            throw WebhookFailed::signingSecretNotSet();
        }

        $computedSignature = hash_hmac('sha256', $request->getContent(), $signingSecret);

        return hash_equals($signature, $computedSignature);
    }
}
