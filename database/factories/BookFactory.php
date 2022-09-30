<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;


class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected  $model = Book::class;
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'description' => $this->faker->text,
            'author_id' => Author::get()->random()->id,
        ];
    }
}
