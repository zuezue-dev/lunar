<?php

namespace Lunar\Api\Concerns;

use Lunar\Models\Language;

trait HasLanguage
{
    protected ?Language $language;

    public function setLanguage(Language $language)
    {
        $this->language = $language;
    }

    public function getLanguage()
    {
        $this->language;
    }
}
