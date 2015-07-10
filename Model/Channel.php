<?php

namespace XTeam\SlackMessengerBundle\Model;

class Channel
{

    /**
     * @var Integer
     */
    protected $id;

    /**
     * @var String
     */
    protected $name;

    public function __construct($id, $name)
    {
        $this->setId($id);
        $this->setName($name);
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $id
     */
    protected function setId($id)
    {
        if (!is_string($id)) {
            throw new \InvalidArgumentException("The Channel Id should be a string");
        }

        $this->id = $id;
    }

    /**
     * @param String $name
     */
    protected function setName($name)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException("The Channel Name should be a string");
        }

        $this->name = $name;
    }
}
