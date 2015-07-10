SlackMessenger
=========================

This bundle allows you to receive and publish messages from Slack mapped to `Message` objects.

Extending
---------

To receive messages you need to create an EventListener which will be listening to the event `slack.message_received`

Example:

```
namespace PP\AwesomeBundle\EventListener;

use XTeam\SlackMessengerBundle\Event\MessageEvent;

class AwesomeWorkListener
{
    public function doYourJob(MessageEvent $event)
    {
        $message = $event->getMessage();
        /** Do the right job **/
    }
}
```

And register this in `services.yml`

```
;PP/AwesomeBundle/Resources/config/service.yml
services:
    pp_awesome.awesome.listener:
        class: %pp_awesome.awesome.listener.class%
        tags:
            - { name: kernel.event_listener, event: slack.message_received, method: doYourJob }
```