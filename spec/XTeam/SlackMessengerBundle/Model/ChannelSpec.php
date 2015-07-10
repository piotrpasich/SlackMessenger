<?php

namespace spec\XTeam\SlackMessengerBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ChannelSpec extends ObjectBehavior
{
    private $wrongDataSet = [
        [
            'channelId' => 'C2147483705',
            'channelName' => [],
            'message' => "The Channel Name should be a string",
        ],
        [
            'channelId' => [],
            'channelName' => 'general',
            'message' => "The Channel Id should be a string",
        ],
        [
            'channelId' => [],
            'channelName' => [],
            'message' => "The Channel Id should be a string",
        ],
    ];

    function it_is_initializable()
    {
        $this->beConstructedWith(
            $id = 'C2147483705',
            $name = 'general'
        );

        $this->getId()->shouldReturn($id);
        $this->getName()->shouldReturn($name);

        $this->shouldHaveType('XTeam\SlackMessengerBundle\Model\Channel');
    }

    function it_cannot_initialize_wrong_data()
    {
        foreach ($this->wrongDataSet as $dataSet) {
            $this->shouldThrow(new \InvalidArgumentException($dataSet['message']))
                 ->during('__construct',[
                     $dataSet['channelId'],
                     $dataSet['channelName']
                 ]);
        }
    }
}
