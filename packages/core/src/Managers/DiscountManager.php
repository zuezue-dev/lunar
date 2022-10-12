<?php

namespace Lunar\Managers;

use Illuminate\Support\Collection;
use Lunar\Base\DataTransferObjects\CartDiscount;
use Lunar\Base\DiscountManagerInterface;
use Lunar\DiscountTypes\Coupon;
use Lunar\DiscountTypes\ProductDiscount;
use Lunar\Models\Cart;
use Lunar\Models\CartLine;
use Lunar\Models\Discount;

class DiscountManager implements DiscountManagerInterface
{
    protected $discounts = null;

    protected $types = [
        Coupon::class,
        ProductDiscount::class,
    ];

    /**
     * The applied discounts.
     *
     * @var Collection
     */
    protected Collection $applied;

    public function __construct()
    {
        $this->applied = collect();
    }

    public function addType($classname)
    {
        $this->types[] = $classname;

        return $this;
    }

    public function getTypes()
    {
        return collect($this->types)->map(function ($class) {
            return app($class);
        });
    }

    public function addApplied(CartDiscount $cartDiscount): self
    {
        $this->applied->push($cartDiscount);

        return $this;
    }

    public function getApplied()
    {
        return $this->applied;
    }

    public function setUp(CartLine $cartLine)
    {
        if (! $this->discounts) {
            $this->discounts = Discount::active()->orderBy('priority')->get();
        }

        foreach ($this->discounts as $discount) {
            $cartLine = $discount->getType()->setUp($cartLine);
        }

        return $cartLine;
    }

    public function apply(Cart $cart)
    {
        if (! $this->discounts) {
            $this->discounts = Discount::active()->orderBy('priority')->get();
        }

        foreach ($this->discounts as $discount) {
            $cart = $discount->getType()->apply($cart);
        }

        return $cart;
    }
}