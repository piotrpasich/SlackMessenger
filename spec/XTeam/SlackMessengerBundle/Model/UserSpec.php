<?php

namespace spec\XTeam\SlackMessengerBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    private $wrongDataSet = [
        [
            'userId' => 'Not an integer',
            'userName' => [],
            'message' => "The User Id should be an integer",
        ],
        [
            'userId' => 1,
            'userName' => [],
            'message' => "The User Name should be a string",
        ],
        [
            'userId' => 'Not an integer',
            'userName' => 'XTeam',
            'message' => "The User Id should be an integer",
        ],
    ];

    function it_is_initializable()
    {
        $this->beConstructedWith(
            $id = 87,
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
