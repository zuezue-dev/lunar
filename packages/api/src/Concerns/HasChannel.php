<?php

namespace Lunar\Api\Concerns;

use Lunar\Models\Channel;

trait HasChannel
{
    protected ?Channel $channel;

    public function setChannel(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function getChannel()
    {
        $this->channel;
    }
}
