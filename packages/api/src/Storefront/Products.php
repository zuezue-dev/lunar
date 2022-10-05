<?php

namespace Lunar\Api\Storefront;

use Lunar\Api\Concerns\HasChannel;
use Lunar\Models\Product;

class Products
{
    use HasChannel;

    public function paginate()
    {
        // Return paginated products for the channel
        $prefix = config('lunar.database.table_prefix');

        return Product::whereHas('channels', function ($q) use ($prefix) {
            $q->where("{$prefix}channels.id", "=", $this->channel->id);
        })->paginate();

        // TODO: need to have a think about pagination approach
    }

    // Thoughts...
    //
    // Are we going to end up making a high-level query builder?

    // e.g.

    public function filterByBrands($brands)
    {
        //$this->query->whereHas(...)
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

}
