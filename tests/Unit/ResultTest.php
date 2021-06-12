<?php

namespace Tests\Unit;

use App\Models\Result;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ResultTest extends TestCase
{
    use DatabaseMigrations;

    public function test_result_can_be_stored(){
        Result::create([
            'applicant_id'=> 21090001,
            'correct_answer'=> 55,
            'incorrect_answer'=> 24,
            'score'=> 55-0.4*24,
        ]);
        $result = Result::first();
        $this->assertNotNull($result);
        $this->assertEquals($result->applicant_id, 21090001);
        $this->assertEquals($result->correct_answer, 55);
        $this->assertEquals($result->incorrect_answer, 24);
        $this->assertEquals($result->score, 55-0.4*24);
    }
}
