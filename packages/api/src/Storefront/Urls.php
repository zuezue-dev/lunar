<?php

namespace Lunar\Api\Storefront;

use Lunar\Api\Actions;
use Lunar\Base\Traits\HasMacros;
use Lunar\Models\Url;

class Urls
{
    use HasMacros;

    public function getDefaultUrl(Url $url)
    {
        return (new Actions\Urls\GetDefaultUrl(
            $url
        ))->execute();
    }
}
