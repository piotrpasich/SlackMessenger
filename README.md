SlackMessenger
==============

This bundle allows you to receive and publish messages from Slack mapped to `Message` objects.

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/piotrpasich/SlackMessenger/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/piotrpasich/SlackMessenger/?branch=master)
[![ScrutinizerBuild Status](https://scrutinizer-ci.com/g/piotrpasich/SlackMessenger/badges/build.png?b=master)](https://scrutinizer-ci.com/g/piotrpasich/SlackMessenger/build-status/master)
[![Travis Build Status](https://travis-ci.org/piotrpasich/SlackMessengerBundle.svg?branch=master)](https://travis-ci.org/piotrpasich/SlackMessengerBundle)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/a5e2dc1f-79fd-4077-91ef-168f0141f64e/mini.png)](https://insight.sensiolabs.com/projects/a5e2dc1f-79fd-4077-91ef-168f0141f64e)


Extending
---------

To receive messages, you need to create an `EventListener` which will be listening to `slack.message_received` event:

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

And register it in `services.yml`:

```
;PP/AwesomeBundle/Resources/config/service.yml
services:
    pp_awesome.awesome.listener:
        class: %pp_awesome.awesome.listener.class%
        tags:
            - { name: kernel.event_listener, event: slack.message_received, method: doYourJob }
```


Installation
------------

### Step 1: Require bundle using composer

``` bash
$ php composer.phar require xteam/slackmessengerbundle "dev-master"
```

### Step 2: Enable the bundle in application's kernel

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new XTeam\SlackMessengerBundle\XTeamSlackMessengerBundle(),
    );
}
```

### Step 3: Add bundle config to `parameters.yml` file

```
# app/config/parameters.yml
parameters:
  # ...
  slack.token: Your Slack token
```

### Step 4: Register routes

```
# app/config/routes.yml

x_team_slack_messenger:
    resource: "@XTeamSlackMessengerBundle/Resources/config/routing.yml"
    prefix:   /

```

Notes
-----

This bundle requires a Symfony in version 2.7 or higher

Usage example
-------------

```
curl -X POST --data 'token=XXXXXXXXXXXXXXXXXX&team_id=T0001&team_domain=example&channel_id=C2147483705&channel_name=test&timestamp=1355517523.000005&user_id=U2147483697&user_name=Steve&text=googlebot: What is the air-speed velocity of an unladen swallow?&trigger_word=googlebot' http://localhost/app_dev.php/v1/message/post

curl -X POST --data 'token=XXXXXXXXXXXXXXXXXX&team_id=T0001&team_domain=example&channel_id=C2147483705&channel_name=test&timestamp=1355517523.000005&user_id=U2147483697&user_name=Steve&text=googlebot: What is the air-speed velocity of an unladen swallow? /five <@U07E9557H> and <@U07HSHYAU>&trigger_word=googlebot' http://localhost/app_dev.php/v1/message/post
```
