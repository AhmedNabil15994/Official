<?php

return [
      'configs' => [
            [
                  'name' => 'default',
                  'signing_secret' => '',
                  'signature_header_name' => 'Signature',
                  'signature_validator' => App\Handler\WebhookSignature::class,
                  'webhook_profile' => \Spatie\WebhookClient\WebhookProfile\ProcessEverythingWebhookProfile::class,
                  'webhook_response' => \Spatie\WebhookClient\WebhookResponse\DefaultRespondsTo::class,
                  'webhook_model' => \Spatie\WebhookClient\Models\WebhookCall::class,
                  'process_webhook_job' => App\Handler\MessagesWebhook::class,
            ],
      ],
];
