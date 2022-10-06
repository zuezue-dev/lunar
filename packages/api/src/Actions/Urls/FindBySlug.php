<?php

namespace Lunar\Api\Actions\Urls;

use Lunar\Models\Url;

class FindBySlug
{
    public function __construct(public string $type, public string $slug, public array $eagerLoad = [])
    {
        //
    }

    /**
     * Execute the action.
     */
    public function execute()
    {
        return Url::whereElementType($this->type)
            ->whereSlug($this->slug)
            ->with($this->eagerLoad)
            ->first();
    }
}
