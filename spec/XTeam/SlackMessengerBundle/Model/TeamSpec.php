<?php

namespace spec\XTeam\SlackMessengerBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TeamSpec extends ObjectBehavior
{
    private $wrongDataSet = [
        [
            'teamId' => 'Not an integer',
            'teamName' => [],
            'message' => "The Team id should be an integer",
        ],
        [
            'teamId' => 1,
            'teamName' => [],
            'message' => "The Team name should be a string",
        ],
        [
            'teamId' => 'Not an integer',
            'teamName' => 'XTeam',
            'message' => "The Team id should be an integer",
        ],
    ];

    function it_is_initializable()
    {
        $this->beConstructedWith(
            $teamId = 87,
            $teamDomain = 'XTeam'
        );
        $this->shouldHaveType('XTeam\SlackMessengerBundle\Model\Team');
        $this->getName()->shouldReturn($teamDomain);
        $this->getId()->shouldReturn($teamId);
    }

    function it_cannot_initialize_wrong_data()
    {
        foreach ($this->wrongDataSet as $dataSet) {
            $this->shouldThrow(new \InvalidArgumentException($dataSet['message']))
                 ->during('__construct',[
                     $dataSet['teamId'],
                     $dataSet['teamName']
                 ]);
        }
    }
}
