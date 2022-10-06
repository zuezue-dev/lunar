<?php

namespace Lunar\Api\Globals;

use Illuminate\Support\Facades\Facade;
use Lunar\Models\Language;

class GlobalLanguage
{
    protected ?Language $channel = null;

    public function __construct()
    {
        // Initially set default language
        $this->language = Language::default()->first();
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage(Language $language)
    {
        $this->language = $language;
    }
}
