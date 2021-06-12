<?php

namespace Tests\Feature\Scholarship;

use App\Models\AdmitCard;
use App\Models\Applicant;
use App\Models\Center;
use App\Models\Exam;
use App\Models\School;
use App\Notifications\ApplicationReceivedNotification;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Tests\Traits\Admin;

class ApplicantTest extends TestCase
{
    use DatabaseMigrations, Admin;
    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();

        $exam = Exam::factory()->make();
        $exam->is_ongoing = 1;
        $exam->save();
        $this->school_id = School::factory()->create()->id;
        $this->exam_id = Exam::factory()->create()->id;
    }

    public function test_applicant_can_see_admitCard(){
        $applicant = Applicant::factory()->create();
        $this->assertNull($applicant->admitCard);
        AdmitCard::createFor($applicant);

        $applicant = Applicant::findOrFail($applicant->id);
        $admitCard = $applicant->admitCard;
        $this->assertNotNull($admitCard);

        $this->assertNotNull($applicant->exam_name);
        $this->assertTrue(is_string($applicant->exam_name));

        $this->assertEquals($applicant->exam_name, $admitCard->exam_name);
        $this->assertEquals($applicant->name, $admitCard->applicant_name);
        $this->assertEquals($applicant->image, $admitCard->applicant_image);
        $this->assertEquals($applicant->father_name, $admitCard->father_name);
        $this->assertEquals($applicant->mother_name, $admitCard->mother_name);
        $this->assertEquals($applicant->school_name, $admitCard->school_name);
        $this->assertNotNull($admitCard->room_number);
        $this->assertTrue(is_numeric($admitCard->sit_number));
        $this->assertTrue(is_numeric($admitCard->room_number));
    }

    public function test_admitCard_can_be_created_for_applicant(){
        $applicant = Applicant::factory()->create();
        $this->assertNull($applicant->admitCard);
        $response = $this->actingAs($this->admin())->get($applicant->create_admit_card_url);
        $response->assertViewIs($applicant->create_admit_card_view);
        $response->assertViewHasAll(['applicant', 'centers']);
    }

    public function test_admitCard_can_be_seen_for_applicant(){
        $applicant = Applicant::factory()->create();
        $this->assertNull($applicant->admitCard);
        $response = $this->actingAs($this->admin())->get($applicant->create_admit_card_url);
        $response->assertViewIs($applicant->create_admit_card_view);
        $response->assertViewHasAll(['applicant', 'centers']);
    }

    public function test_applicants_details_can_be_shown(){

        $this->postStoreApplicant();

        $applicant = Applicant::first();
        $response = $this->actingAs($this->admin())->get($applicant->url);
        $response->assertOk();
        $response->assertViewIs(Applicant::showView());
        $this->deleteImage($applicant);
    }

    // public function test_applicant_can_be_updated(){
    //     $this->postStoreApplicant();
    //     $applicant = Applicant::first();


    //     $response = $this->actingAs($this->admin())->put($applicant->url, 
    //         $this->data([
    //             'name'=> 'Abdul Halim'
    //         ])
    //     );
    //     $response->assertStatus(302);
        
    //     $applicant = applicant::first();
    //     $this->deleteImage($applicant);
    //     $this->assertEquals($applicant->name, 'Abdul Halim');
    // }

    // public function test_applicant_can_be_deleted(){

    //     $this->postStoreApplicant();

    //     $applicant = Applicant::first();
    //     $this->assertFileExists(Applicant::getImageDirectory().'/'.$applicant->image);

    //     $response = $this->actingAs($this->admin())->delete($applicant->url);

    //     $this->assertNull(Applicant::first());
    //     $this->assertFileDoesNotExist(Applicant::getImageDirectory().'/'.$applicant->image);
    //     $response->assertOk();
    // }

    private function postStoreApplicant(){
        
        return $this->post('application/submit', $this->data());
    }

    private function deleteImage($applicant): void{
        $this->assertFileExists(Applicant::getImageDirectory().'/'.$applicant->image);
        $applicant->removeImage();
        $this->assertFileDoesNotExist(Applicant::getImageDirectory().'/'.$applicant->image);
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

    private function createAdmitCard(){
        return AdmitCard::create($this->data());
    }
}
