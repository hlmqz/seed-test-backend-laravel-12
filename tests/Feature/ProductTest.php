<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;

class ProductTest extends TestCase
{
	use RefreshDatabase;

//===================================================================================

	protected function setUp(): void
	{
		parent::setUp();

		$user = User::factory()->create();
		$this->actingAs($user, 'sanctum');
	}

//===================================================================================

	public function testCreateProductSuccessfully()
	{
		$payload = [
			'name' => 'Tomato',
			'price' => 225,
			'description' => 'Tomato, no Tomate.',
			'active' => 1,
		];

		$response = $this->postJson('/api/product', $payload);

		$response->assertStatus(200)
				 ->assertJsonFragment($payload);

		$this->assertDatabaseHas('products', $payload);
	}

//===================================================================================

	public function testValidateRequiredFields()
	{
		$response = $this->postJson('/api/product', []);

		$response->assertStatus(422)
				 ->assertJsonValidationErrors(['name', 'price', 'description', 'active']);
	}

//===================================================================================

	public function testListproducts()
	{
		Product::factory()->count(25)->create();

		$response = $this->getJson('/api/products');

		$response->assertStatus(200)
				 ->assertJsonStructure([
						 'current_page',
						 'data' => [
								'*' => [
									'id',
									'name',
									'price',
									'description',
									'active',
									'created_at',
									'updated_at',
								],
						 ],
						 'first_page_url',
						 'from',
						 'last_page',
						 'last_page_url',
						 'links',
						 'next_page_url',
						 'path',
						 'per_page',
						 'prev_page_url',
						 'to',
						 'total',
				]);

		$this->assertCount(15, $response->json('data'));
	}

//===================================================================================

}
