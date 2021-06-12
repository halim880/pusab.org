<?php

namespace Database\Factories;

use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->name(),
            'is_ongoing'=> false,
            'date'=> Carbon::now(),
        ];
    }

    private function name(){
        return "PUSAB MEDHA BRITTI PORIKKHA, ".rand(2016, 2021);
    }
}
