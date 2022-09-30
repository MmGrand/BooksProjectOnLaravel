<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected  $model = Author::class;
    public function definition()
    {
        return [
            'author'=> $this->faker->sentence(2),
            'description'=> $this->faker->text,
            'date_of_birth'=> $this->faker->date,
        ];
    }
}
