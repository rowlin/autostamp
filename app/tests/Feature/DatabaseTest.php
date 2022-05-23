<?php

namespace Tests\Feature;

use App\Price;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class DatabaseTest extends TestCase
{
    use WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreatePrice()
    {
        $price = $this->faker->randomFloat(2, 0, 10000);
        factory(Price::class)->create(['price' => $price ]);
        $this->assertDatabaseHas('prices' , [ 'price' => $price]);
    }


}
