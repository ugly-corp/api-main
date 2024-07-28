<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public array $names = [
        'Коты', 'Абстракция', 'Еда', 'Одежда', 'Другое',
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement($this->names),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Category $category) {
            $category->addMedia(public_path('images/test-category-1.jpg'))
                ->preservingOriginal()
                ->toMediaCollection();
        });
    }
}
