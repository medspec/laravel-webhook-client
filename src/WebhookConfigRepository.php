<?php

namespace Medspec\WebhookClient;

class WebhookConfigRepository
{
    /** @var \Medspec\WebhookClient\WebhookConfig[] */
    protected array $configs;

    public function addConfig(WebhookConfig $webhookConfig)
    {
        $this->configs[$webhookConfig->name] = $webhookConfig;
    }

    public function getConfig(string $name): ?WebhookConfig
    {
        return $this->configs[$name] ?? null;
    }
}
