<?php

namespace Medspec\WebhookClient\Models;

use Exception;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Http\Request;
use Medspec\WebhookClient\WebhookConfig;

class WebhookCall extends Model
{
    public $guarded = [];

    protected $casts = [
        'payload' => 'array',
        'exception' => 'array',
    ];

    public static function storeWebhook(WebhookConfig $config, Request $request): WebhookCall
    {
        return self::create([
            'name' => $config->name,
            'payload' => $request->input(),
        ]);
    }

    public function saveException(Exception $exception)
    {
        $this->exception = [
            'code' => $exception->getCode(),
            'message' => $exception->getMessage(),
            'trace' => $exception->getTraceAsString(),
        ];

        $this->save();

        return $this;
    }

    public function clearException()
    {
        $this->exception = null;

        $this->save();

        return $this;
    }
}
