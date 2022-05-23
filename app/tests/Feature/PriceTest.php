<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Middleware\VerifyCsrfToken;

class PriceTest extends TestCase
{
    use HelpTrait;
    use WithFaker;


    protected function setUp()
    {
        parent::setUp();
        $this->withoutMiddleware(VerifyCsrfToken::class);
    }

    public function testPriceCanGetPage()
    {
        $resp =  $this->get('/prices');
        $resp->assertStatus(200);
    }

    protected function generateRequest(array $data = []) : array{
        return [
            'product_id' =>  $data['product_id'] ?? rand(0, 10),
            'store_id' =>  $data['store_id'] ?? null ,
            'price' => $data['price'] ?? $this->faker->randomDigit ,
            'starts_at' => $data['starts_at'] ?? $this->faker->dateTime

        ];
    }

    public function testPriceSetProductById(){
        $product = $this->getFirstProduct();
        $data =[
            'product_id' =>  $product->id,
            'store_id' => null ,
            'price' => $data['price'] ?? $this->faker->randomDigit ,
            'starts_at' => $data['starts_at'] ?? $this->faker->dateTime
        ];
         $resp  =$this->post('price/update' , $data );
         $this->assertDatabaseHas('prices', $data);
         $resp->assertStatus(302);
    }


    public function testPriceSetProductByCode(){
        $product = $this->getFirstProduct();
        $data = $this->generateRequest([
            'product_id' => $product->code,
            'store_id' => null,
        ]);

        $resp  = $this->post('price/update' , $data );
        $this->assertDatabaseHas('prices', ['product_id' => $product->id , 'store_id' => $data['store_id'] ,'price' => $data['price'] ]);
        $resp->assertStatus(302);
    }

    public function testPriceSetProductByWrongCode(){
        $data = $this->generateRequest([
            'product_id' => $this->faker->word,
            'store_id' => null,
        ]);
        $resp  =$this->post('price/update' , $data );
        $resp->assertStatus(302);
    }





}
