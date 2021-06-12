<?php

namespace Database\Factories;

use App\Models\Center;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class CenterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Center::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exam_id'=> Exam::factory()->create()->id,
            'name'=> $this->faker->sentence(4),
            'address'=> $this->faker->sentence(4),
        ];
    }
}
