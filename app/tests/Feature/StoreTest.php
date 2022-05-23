<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Middleware\VerifyCsrfToken;
use App\Store;

class StoreTest extends TestCase
{
    use WithFaker;
    use HelpTrait;

    protected function setUp()
    {
        parent::setUp();
        $this->withoutMiddleware(VerifyCsrfToken::class);
    }


    protected function generateNewStore(array $data = []){
        return  [
            'name' => $data['name'] ?? $this->faker->text(30),
            'description' => $data['description'] ?? $this->faker->text(300),
        ];
    }

    public function testStoreCreateNew()
    {
        $store = $this->generateNewStore();
        $response = $this->post('/store/create', $store );
        $this->assertDatabaseHas('stores' , ['name' => $store['name']] );
        $response->assertRedirect('stores');
    }

    public function testStoreCreateIfNameNotRequired(){
        $store = $this->generateNewStore(['name' => '']);
        $this->post('/store/create', $store );
        $this->assertDatabaseMissing('stores' ,  $store );
    }

    public function testStoreUpdate(){
        $store = $this->getFirstStore();
        $new_store = $this->generateNewStore();
        $res =  $this->patch('/store/update/'. $store->id , $new_store);
        $res->assertStatus(302);
        $this->assertDatabaseHas('stores' , [ 'name' =>$new_store['name']]);
    }

    public function testStoreDelete(){
        $store = $this->getFirstStore();
        $this->delete('/store/delete/'. $store->id);
        $this->assertDatabaseMissing('stores' ,  $store->toArray());
    }
}
