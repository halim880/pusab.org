<?php

namespace Tests\Feature\Backend;

use App\Models\Advisor;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Tests\Traits\Admin;

class AdvisorTest extends TestCase
{
    use DatabaseMigrations, Admin;

    public function setUp():void{
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    public function test_advisor_create_page_can_rendered(){
        $response = $this->actingAs($this->admin())->get(Advisor::createUrl());
        $response->assertViewIs('backend.advisor.create');
    }

    public function test_advisor_details_can_showed(){
        $advisor = Advisor::factory()->create();

        $response = $this->actingAs($this->admin())->get($advisor->url);
        $response->assertViewIs('backend.advisor.show');
        $response->assertViewHas('advisor');
        $response->assertSee($advisor->name);
        $response->assertSee($advisor->institution);
        $response->assertSee($advisor->department);
    }

    public function test_advisor_can_be_updated(){
        $advisor = Advisor::factory()->create();
        $response = $this->actingAs($this->admin())->put($advisor->url,[
            'name'=> 'Nayeem',
            'profession'=> 'Doctor',
            'institution'=> 'Shahjalal university',
            'department'=> 'Computer Science & Engineering',
            'passing_year'=> 1999,
            'job_title'=> 'Lecturer (Bangla)',
            'job_location'=> 'Digendra Barman Degree college',
            'phone'=> '01743920880',
            'image'=> UploadedFile::fake()->image('advisor.jpg'),
        ]);
        
        $response->assertRedirect($advisor->url);
        $advisor = Advisor::find($advisor->id);
        $this->assertEquals($advisor->name, 'Nayeem');
    }
}
