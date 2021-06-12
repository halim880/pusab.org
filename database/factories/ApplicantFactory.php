<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\Exam;
use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Applicant::class;
    private const IMG_FROM_DIR = '';

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name,
            'father_name' => $this->faker->firstNameMale.' '.$this->faker->lastName,
            'mother_name' => $this->faker->firstNameFemale.' '.$this->faker->lastName,
            'post_office' => $this->faker->streetName,
            'school_id'=> $this->schoolId(),
            'class'=> random_int(8,10),
            'exam_id'=> $this->examId(),
            'village' => $this->faker->streetName,
            'post_office'=>$this->faker->word(),
            'union' => $this->faker->city,
            'current_address'=> $this->faker->address,
            'phone'=> $this->phone(),
            'image' => $this->image(),
        ];
    }

    private function phone(){
        return '+880 1'.rand(6,9).rand(1,9).rand(0,9).rand(100000, 999999);
    }

    private function image(){
        return $this->faker->file(storage_path('images'), Applicant::getImageDirectory(), false);
    }

    private function schoolId(){
        $schools = School::all();
        if ($schools->count()<1) {
            return School::factory()->create()->id;
        }
        return $schools->random()->id;
    }

    private function examId(){
        $exams = Exam::all();
        if ($exams->count()<1) {
            return Exam::factory()->create()->id;
        }
        return $exams->random()->id;
    }
}
