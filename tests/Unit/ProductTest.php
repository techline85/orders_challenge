<?php

namespace Tests\Unit;

use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testExample(): void
    {
        $this->assertTrue(true);
    }

    public function testItShouldReturnAPrice()
    {
        $product = Product::factory()->make([
            'price' => 100,
        ]);

        $this->assertEquals(100, $product->price);
    }
}
