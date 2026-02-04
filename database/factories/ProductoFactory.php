<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;
    public function definition(): array
    {
        return [
            'categoria_id' => Categoria::factory(),
            'nombre' => $this->faker->words(2, true),
            'stock' => $this->faker->numberBetween(0, 100),
            'price' => $this->faker->randomFloat(2, 10, 9999),
            'user_id' => User::factory(),
        ];
    }
}
