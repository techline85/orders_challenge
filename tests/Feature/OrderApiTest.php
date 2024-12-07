<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class OrderApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testExample(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAnAuthenticatedUserCanCreateAnOrderThrowsAValidationException()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);
        $response = $this->postJson('/api/orders', [
            'customer_name' => 'John Doe',
            'products' => [['id' => 1, 'quantity' => 2]],
        ]);

        $response->assertStatus(422);
    }

    public function testAnAuthenticatedUserCanCreateAnOrder()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);
        $response = $this->postJson('/api/orders', [
            'customer_name' => 'John Doe',
            'status' => 'pending',
            'products' => [['id' => 1, 'quantity' => 2]],
        ]);

        $response->assertStatus(201);
        $response->assertJsonFragment(['customer_name' => 'John Doe']);
    }

    public function an_admin_can_view_all_orders()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Sanctum::actingAs($admin);

        $response = $this->getJson('/api/orders');

        $response->assertStatus(200);
    }

    public function a_customer_cannot_view_all_orders()
    {
        $user = User::factory()->create(['role' => 'customer']);
        Sanctum::actingAs($user);

        $response = $this->getJson('/api/orders');

        $response->assertStatus(403);
    }
}
