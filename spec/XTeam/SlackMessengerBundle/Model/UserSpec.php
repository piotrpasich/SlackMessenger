<?php

namespace spec\XTeam\SlackMessengerBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    private $wrongDataSet = [
        [
            'userId' => 1,
            'userName' => [],
            'message' => "The User Id should be a string",
        ],
        [
            'userId' => 'C2147483705',
            'userName' => [],
            'message' => "The User Name should be a string",
        ],
        [
            'userId' => 1,
            'userName' => 'XTeam',
            'message' => "The User Id should be a string",
        ],
    ];

    function it_is_initializable()
    {
        $this->beConstructedWith(
            $id = 'C2147483705',
            $name = 'papi'
        );
        $this->shouldHaveType('XTeam\SlackMessengerBundle\Model\User');
        $this->getId()->shouldReturn($id);
        $this->getName()->shouldReturn($name);
    }

    function it_cannot_initialize_wrong_data()
    {
        foreach ($this->wrongDataSet as $dataSet) {
            $this->shouldThrow(new \InvalidArgumentException($dataSet['message']))
                 ->during('__construct',[
                     $dataSet['userId'],
                     $dataSet['userName']
                 ]);
        }
    }
}
