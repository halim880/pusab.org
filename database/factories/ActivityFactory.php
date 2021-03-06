<?php

namespace Database\Factories;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence(rand(4,7)),
            'description'=> $this->faker->sentence(rand(50, 100)),
            'time'=> Carbon::today()->subDays(rand(0, 365)),
            'image'=> $this->image(),
        ];
    }

    private function image(){
        return $this->faker->file(storage_path('images'), Activity::getImageDirectory(), false);
    }
}
