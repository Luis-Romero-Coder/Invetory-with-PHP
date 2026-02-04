<?php

namespace Tests\Unit;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoriaProductoTest extends TestCase
{
    use RefreshDatabase;

    public function test_categoria_tiene_productos(): void
    {
        $categoria = Categoria::factory()
            ->has(Producto::factory()->count(2), 'productos')
            ->create();

        $this->assertCount(2, $categoria->productos);
    }

    public function test_producto_pertenece_a_categoria(): void
    {
        $producto = Producto::factory()->create();

        $this->assertInstanceOf(Categoria::class, $producto->categoria);
    }
}