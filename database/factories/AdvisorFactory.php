<?php

namespace Database\Factories;

use App\Models\Advisor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Role;

class AdvisorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advisor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> $this->userId(),
            'institution'=> $this->faker->sentence(5),
            'department'=> $this->faker->sentence(4),
            'passing_year' => rand(1990, 2020),
            'profession'=>$this->profession(),
            'job_title' => $this->faker->jobTitle,
            'job_location'=> $this->faker->secondaryAddress,
            'phone'=> $this->phone(),
            'image' => $this->image(),
            'approved' => true,
        ]; 
    }

    public function userId(){
        $user = User::factory()->create();

        if (is_null(Role::where('name', 'advisor')->first())) {
            Role::create(['name'=> 'advisor']);
        }

        $user->assignRole('advisor');
        return $user->id;
    }

    public function phone(){
        return '01'.rand(6,9).rand(1,9).rand(0,9).rand(100000, 999999);
    }

    public function image(){
        return $this->faker->file(storage_path('images'), Advisor::getImageDirectory(), false);
    }

    public function profession(){
        $professions = ['Doctor', 'Police', 'Megistrate', 'Bussiness', 'Teacher', 'Engineer'];
        return $professions[rand(0,5)];
    }
}
