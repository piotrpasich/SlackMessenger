<?php

namespace XTeam\SlackMessengerBundle\Builder;

interface MessageBuilder
{
    /**
     * Returns Message
     *
     * @param array $rawPayloadData
     * @return Message
     */
    public function getMessage(array $rawPayloadData);

}