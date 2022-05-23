<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Middleware\VerifyCsrfToken;
class ProductTest extends TestCase
{
    use WithFaker;
    use HelpTrait;

    protected function setUp()
    {
        parent::setUp();
        $this->withoutMiddleware(VerifyCsrfToken::class);
    }

    protected function generateNewProduct(array $data = []){
        return  [
            'code' => $data['code'] ?? $this->faker->word,
            'name' => $data['name'] ?? $this->faker->text(30),
            'description' => $data['description'] ?? $this->faker->text(300),
            'image' => $data['image'] ?? NULL
        ];
    }

    public function testProductCreateNew()
    {
        $product = $this->generateNewProduct();
         $response = $this->post('/product/create', $product );
         $this->assertDatabaseHas('products' ,  $product );
         $response->assertRedirect('products');
    }

    public function testProductCreateIfNameNotRequired(){
        $product = $this->generateNewProduct(['name' => '']);
        $this->post('/product/create', $product );
        $this->assertDatabaseMissing('products' ,  $product );
    }

    public function testProductUpdate(){
        $product = $this->getFirstProduct();
        $new_product = $this->generateNewProduct();
        $this->patch('/product/update/'. $product->id , $new_product);
        $this->assertDatabaseHas('products' ,  $new_product);
    }

    public function testProductDelete(){
        $product = $this->getFirstProduct();
        $this->delete('/product/delete/'. $product->id);
        $this->assertDatabaseMissing('products' ,  $product->toArray());
    }



}
