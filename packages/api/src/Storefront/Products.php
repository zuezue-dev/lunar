<?php

namespace Lunar\Api\Storefront;

use Lunar\Api\Concerns\HasChannel;
use Lunar\Base\Traits\HasMacros;
use Lunar\Models\Product;

class Products
{
    use HasChannel, HasMacros;

    protected $query;

    public function __construct()
    {
        $this->query = Product::query();
    }

    public function filterByChannel() // Maybe we optionally set a channel, otherwise it defaults?
    {
        $prefix = config('lunar.database.table_prefix');

        $this->query->whereHas('channels', function ($q) use ($prefix) {
            $q->where("{$prefix}channels.id", "=", $this->channel->id);
        });

        return $this;
    }

    public function filterByAvailable()
    {
        //
    }

    public function filterByCustomerGroup()
    {
        //
    }

    public function filterByStock()
    {
        //
    }

    public function filterByCollection()
    {
        //
    }

    public function filterByAssociation()
    {
        //
    }

    public function filterByTag()
    {
        //
    }

    public function filterByType()
    {
        //
    }

    public function filterBySlug($slug)
    {
        //
    }

    public function filterByBrands($brands)
    {
        //$this->query->whereHas(...)
    }

    public function withPrimaryImage()
    {
        //
    }

    public function withImages()
    {
        //
    }

    public function withCheapestVariant()
    {
        //
    }

    public function withFirstVariant() // Issue: Can't reorder variants in the hub?
    {
        //
    }

    public function withVariants()
    {
        // Variants are fairly simple, so just include everything?
    }

    public function query()
    {
        return $this->query;
    }

    public function get()
    {
        return $this->query->get();
    }

    public function first()
    {
        return $this->query->first();
    }

    public function paginate($perPage = null)
    {
        return $this->query->paginate($perPage);
    }
}
