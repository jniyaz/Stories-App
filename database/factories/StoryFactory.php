<?php

namespace Database\Factories;

use App\Models\Story;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Story::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['long', 'short']);
        $body = ($type == 'short') ? $this->faker->text(100) : $this->faker->paragraph();
        
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->unique()->lexify('????????????'),
            'body' => $body,
            'type' => $type,
            'status' => $this->faker->boolean()
        ];
    }
}
