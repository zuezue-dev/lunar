<?php

namespace Lunar\Api\Actions\Urls;

use Lunar\Models\Url;

class GetDefaultUrl
{
    public function __construct(public Url $url, public array $eagerLoad = [])
    {
        //
    }

    /**
     * Execute the action.
     */
    public function execute()
    {
        return Url::whereElementType($this->url->element_type)
            ->whereElementId($this->url->element_id)
            ->whereLanguageId($this->url->language_id)
            ->whereDefault(true)
            ->with($this->eagerLoad)
            ->first();
    }
}
