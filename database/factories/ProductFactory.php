<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->title,
            'product_category_id' => ProductCategory::inRandomOrder()->first()->id,
            'is_active' => $this->faker->boolean,
        ];

    }
    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            $product->saveMedia(['image' =>
                "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",
            ]);
        });
    }
}
