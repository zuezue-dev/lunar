<?php

namespace Lunar\Api\Facades;

use Illuminate\Support\Facades\Facade;

class Storefront extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'storefront';
    }
}
