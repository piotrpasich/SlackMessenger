<?php

namespace XTeam\SlackMessengerBundle\Model;

class Team
{

    /**
     * ex. C2147483705
     * @var Integer
     */
    protected $id;

    /**
     * @var String
     */
    protected $domain;

    public function __construct($id, $domain)
    {
        $this->setId($id);
        $this->setDomain($domain);
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
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param int $id
     */
    protected function setId($id)
    {
        if (!is_string($id)) {
            throw new \InvalidArgumentException("The Team id should be a string");
        }

        $this->id = $id;
    }

    /**
     * @param String $name
     */
    protected function setDomain($name)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException("The Team name should be a string");
        }

        $this->domain = $name;
    }

}
