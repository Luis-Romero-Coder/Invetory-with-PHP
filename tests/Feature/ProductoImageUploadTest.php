<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductoImageUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_upload_product_image(): void
    {
        Storage::fake('public');

        $role = Role::create(['name' => 'user']);
        $user = User::factory()->withPersonalTeam()->create(['role_id' => $role->id]);
        $categoria = Categoria::factory()->create();

        $response = $this->actingAs($user)->post(route('productos.store'), [
            'categoria_id' => $categoria->id,
            'nombre' => 'Producto con imagen',
            'stock' => 5,
            'price' => 120,
            'imagen' => UploadedFile::fake()->image('producto.jpg'),
        ]);

        $response->assertRedirect(route('productos.index'));

        $this->assertDatabaseHas('productos', [
            'nombre' => 'Producto con imagen',
        ]);

        $producto = $user->productos()->where('nombre', 'Producto con imagen')->first();
        $this->assertNotNull($producto->imagen_path);

        Storage::disk('public')->assertExists($producto->imagen_path);
    }
}