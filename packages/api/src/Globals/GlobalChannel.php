<?php

namespace Lunar\Api\Globals;

use Illuminate\Support\Facades\Facade;
use Lunar\Models\Channel;

class GlobalChannel
{
    protected ?Channel $channel = null;

    public function __construct()
    {
        // Initially set default channel
        $this->channel = Channel::default()->first();
    }

    public function getChannel()
    {
        return $this->channel;
    }

    public function setChannel(Channel $channel)
    {
        $this->channel = $channel;
    }
}
