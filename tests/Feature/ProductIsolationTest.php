<?php

namespace Tests\Feature;

use App\Models\Producto;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductIsolationTest extends TestCase
{
    use RefreshDatabase;

    public function test_regular_user_only_sees_own_products()
    {
        // Create roles
        $userRole = Role::create(['name' => 'user']);
        $adminRole = Role::create(['name' => 'admin']);

        // Create users
        $user1 = User::factory()->withPersonalTeam()->create(['role_id' => $userRole->id]);
        $user2 = User::factory()->withPersonalTeam()->create(['role_id' => $userRole->id]);

        // Create products
        $product1 = Producto::create(['nombre' => 'Product 1', 'stock' => 10, 'price' => 100, 'user_id' => $user1->id]);
        $product2 = Producto::create(['nombre' => 'Product 2', 'stock' => 5, 'price' => 50, 'user_id' => $user2->id]);

        // Act as user1
        $response = $this->actingAs($user1)->get(route('productos.index'));

        // Assert user1 sees product1 but not product2
        $response->assertStatus(200);
        $response->assertSee('Product 1');
        $response->assertDontSee('Product 2');
    }

    public function test_admin_sees_all_products()
    {
        // Create roles
        $userRole = Role::create(['name' => 'user']);
        $adminRole = Role::create(['name' => 'admin']);

        // Create users
        $admin = User::factory()->withPersonalTeam()->create(['role_id' => $adminRole->id]);
        $user1 = User::factory()->withPersonalTeam()->create(['role_id' => $userRole->id]);
        $user2 = User::factory()->withPersonalTeam()->create(['role_id' => $userRole->id]);

        // Create products
        $product1 = Producto::create(['nombre' => 'Product 1', 'stock' => 10, 'price' => 100, 'user_id' => $user1->id]);
        $product2 = Producto::create(['nombre' => 'Product 2', 'stock' => 5, 'price' => 50, 'user_id' => $user2->id]);

        // Act as admin
        $response = $this->actingAs($admin)->get(route('productos.index'));

        // Assert admin sees both products
        $response->assertStatus(200);
        $response->assertSee('Product 1');
        $response->assertSee('Product 2');
    }
}
