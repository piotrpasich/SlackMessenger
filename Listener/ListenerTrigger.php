<?php

namespace Xteam\SlackMessengerBundle\Listener;

use CL\Slack\Transport\ApiClient;

class ListenerTrigger
{
    public function __construct(ApiClient $apiClient)
    {
        $apiClient->addResponseListener(function (ResponseEvent $event) {
            $event->getRawPayloadResponse();
        });
    }
}
