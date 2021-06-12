<?php

namespace Tests\Feature\Api;

use App\Models\Applicant;
use App\Models\Exam;
use App\Models\School;
use App\Models\User;
use App\Notifications\ApplicationReceivedNotification;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ApplicantApiTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() :void{
        parent::setUp();
        Role::create(['name'=>'admin']);
        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');
        $this->school_id = School::factory()->create()->id;
        $this->exam_id = Exam::factory()->create()->id;
        Notification::fake();
    }

    public function test_applicant_can_be_stored(){
        $this->withoutExceptionHandling();
        $this->post('api/'.Applicant::storeUrl(), $this->data())->assertCreated();
        $applicant = Applicant::first();

        $this->assertEquals($applicant->name, 'Shohidullah Kaisar');
        $this->assertEquals($applicant->father_name, 'Enayet Ullah');
    }

    public function test_applicant_can_be_deleted(){
        $this->withoutExceptionHandling();

        Applicant::create($this->data());

        $applicant = Applicant::first();
        $this->assertNotNull($applicant);
        $this->delete('api/'.$applicant->url);
        $applicant = Applicant::first();
        $this->assertNull($applicant);
    }

    public function test_applicant_can_be_updated(){
        $this->withoutExceptionHandling();
        Applicant::create($this->data());

        $applicant = Applicant::first();

        $this->put('api/'.$applicant->url, $this->data([
            'name'=> 'Abdul Halim',
        ]));

        $applicant = Applicant::first();
        $this->assertEquals($applicant->name, 'Abdul Halim');
    }

    private function data($merge = []) :array{
        return array_merge(
            [
                'name'=> 'Shohidullah Kaisar',
                'father_name'=> 'Enayet Ullah',
                'mother_name'=> 'Kulsuma Khatun',
                'school_id'=> $this->school_id,
                'class'=> 10,
                'exam_id'=> $this->exam_id,
                'village'=>'Kachir Gati',
                'post_office'=>'Polash',
                'union'=>'Polash',
                'current_address'=> 'Maktab goli, Chittagong',
                'phone'=> '01714 870178',
                'image'=> UploadedFile::fake()->image('random.jpeg'),
            ],
            $merge
        );
    }
}
