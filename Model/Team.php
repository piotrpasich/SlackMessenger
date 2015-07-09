<?php

namespace XTeam\SlackMessengerBundle\Model;

class Team
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

    /**
     * @return int
     */
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
        if (!is_int($id)) {
            throw new \InvalidArgumentException("The Team id should be an integer");
        }

        $this->id = $id;
    }

    /**
     * @param String $name
     */
    protected function setName($name)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException("The Team name should be a string");
        }

        $this->name = $name;
    }

}
