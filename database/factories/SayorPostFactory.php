<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SayorPost;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SayorPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SayorPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> $this->userId(),
            'category_id'=> $this->categoryId(),
            'title'=> $this->faker->sentence(rand(4,10)),
            'body'=> $this->faker->sentence(rand(50, 500)),
            'created_at'=> Carbon::today()->subDays(rand(0, 365)),
        ];
    }

    private function categoryId(){
        if (Category::all()->count()<1) {
            return Category::factory()->create()->id;
        }
        return Category::pluck('id')->random();
    }

    private function userId(){
        if (User::all()->count()<1) {
            return User::factory()->create()->id;
        }
        return User::pluck('id')->random();
    }
}
