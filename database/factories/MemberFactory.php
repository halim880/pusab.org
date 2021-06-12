<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> $this->userId(),
            'father_name' => $this->faker->firstNameMale.' '.$this->faker->lastName,
            'mother_name' => $this->faker->firstNameFemale.' '.$this->faker->lastName,
            'post_office' => $this->faker->streetName,
            'institution'=> $this->faker->sentence(5),
            'department'=> $this->faker->sentence(4),
            'session'=> '2015-2016',
            'college'=> $this->faker->sentence(4),
            'high_school'=> $this->faker->sentence(4),
            'blood_group'=> 'A+',
            'village' => $this->faker->streetName,
            'post_office'=>$this->faker->word(),
            'union' => $this->faker->city,
            'current_address'=> $this->faker->address,
            'phone'=> $this->phone(),
            'image' => $this->image(),
            'approved' => true,
        ]; 
    }

    public function userId(){
        $user = User::factory()->create();
        $user->assignRole('member');
        return $user->id;
    }

    public function phone(){
        return '01'.rand(6,9).rand(1,9).rand(0,9).rand(100000, 999999);
    }

    public function image(){
        return $this->faker->file(storage_path('images'), Member::getImageDirectory(), false);
    }
}
