<?php

namespace XTeam\SlackMessengerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcher;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use XTeam\SlackMessengerBundle\Builder\MessageBuilder;
use XTeam\SlackMessengerBundle\Event\MessageEvent;
use XTeam\SlackMessengerBundle\Model\Message;

class MessageController extends Controller
{
    /**
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    /**
     * @var MessageBuilder
     */
    protected $messageBuilder;

    public function __construct(TraceableEventDispatcher $eventDispatcher, MessageBuilder $messageBuilder)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->messageBuilder = $messageBuilder;
    }

    public function sendAction(Request $request)
    {
        $message = $this->messageBuilder->getMessage($request->request->all());
        $this->eventDispatcher->dispatch('slack.message_received', new MessageEvent($message));

        return new JsonResponse([]);
    }
}
