<?php

namespace XTeam\SlackMessengerBundle\Model;

class Message
{

    /**
     * @var Team
     */
    protected $team;

    /**
     * @var Channel
     */
    protected $channel;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var String
     */
    protected $text;

    /**
     * @var String
     */
    protected $triggerWord;

    public function __construct(User $user, Team $team, Channel $channel, $text, $triggerWord)
    {
        $this->user = $user;
        $this->team = $team;
        $this->channel = $channel;
        $this->setText($text);
        $this->setTriggerWord($triggerWord);
    }

    public function getTeam()
    {
        return $this->team;
    }

    public function getChannel()
    {
        return $this->channel;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getTriggerWord()
    {
        return $this->triggerWord;
    }

    protected function setText($text)
    {
        if (empty($text) || !is_string($text)) {
            throw new \InvalidArgumentException("The text should be a string");
        }

        $this->text = $text;
    }

    protected function setTriggerWord($triggerWord)
    {
        if (empty($triggerWord) || !is_string($triggerWord)) {
            throw new \InvalidArgumentException("The trigger word should be a string");
        }

        $this->triggerWord = $triggerWord;
    }
}
