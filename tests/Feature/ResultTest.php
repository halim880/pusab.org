<?php

namespace Tests\Feature;

use App\Models\Applicant;
use App\Models\Result;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Tests\Traits\Admin;

class ResultTest extends TestCase
{
    use DatabaseMigrations, Admin;

    public function setUp():void{
        parent::setUp();
        
    }

    public function test_result_create_form_can_be_rendored(){
        $response = $this->actingAs($this->admin())->get('scholarship/results/create');
        $response->assertOk();
        $response->assertViewIs('scholarship.result.create');
    }

    public function test_result_can_be_stored(){
        $applicant = Applicant::factory()->create(['id'=>21090001]);
        $data = [
            'applicant_id'=> $applicant->id,
            'correct_answer'=> 55,
            'incorrect_answer'=> 24,
        ];
        $response = $this->actingAs($this->admin())->post('scholarship/results', $data);

        $response->assertSessionHas('success', 'Result is successfully stored..!');
        $result = Result::first();
        $this->assertNotNull($result);
        $this->assertEquals($result->applicant_id, 21090001);
        $this->assertEquals($result->correct_answer, 55);
        $this->assertEquals($result->incorrect_answer, 24);
        $this->assertEquals($result->score, 55-0.4*24);
    }

    public function test_only_admin_can_store_result(){
        $applicant = Applicant::factory()->create(['id'=>21090001]);
        $data = [
            'applicant_id'=> $applicant->id,
            'correct_answer'=> 55,
            'incorrect_answer'=> 24,
        ];
        $this->post('scholarship/results', $data);
        $result = Result::first();
        $this->assertNull($result);

        $this->actingAs($this->admin())->post('scholarship/results', $data);
        $result = Result::first();
        $this->assertNotNull($result);
        $this->assertEquals($result->applicant_id, 21090001);
        $this->assertEquals($result->correct_answer, 55);
        $this->assertEquals($result->incorrect_answer, 24);
        $this->assertEquals($result->score, 55-0.4*24);
    }

    public function test_result_is_not_stored_with_random_roll(){
        $data = [
            'applicant_id'=> 1,
            'correct_answer'=> 55,
            'incorrect_answer'=> 24,
        ];
        $response = $this->actingAs($this->admin())->post('scholarship/results', $data);
        $response->assertSessionHas('error', "Applicant with the id 1 is not found");
    }
}
