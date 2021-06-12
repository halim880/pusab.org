<?php

namespace Tests\Feature\Scholarship;

use App\Models\AdmitCard;
use App\Models\Applicant;
use App\Models\Center;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Tests\Traits\Admin;

class AdmitCardTest extends TestCase
{
    use DatabaseMigrations, Admin;
    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function test_admitCard_create_form_can_be_rendered(){
        $response = $this->actingAs($this->admin())->get(AdmitCard::createUrl());
        $response->assertViewIs(AdmitCard::createView());
    }

    public function test_admitCard_can_be_created(){
        $response = $this->actingAs($this->admin())->post(AdmitCard::storeUrl(), $this->data());
        $admitCard = AdmitCard::first();
        $this->assertNotNull($admitCard);
        $response->assertRedirect($admitCard->url);
        // $this->deleteImage($admitCard);
    }

    public function test_admitCard_can_be_deleted(){

        $this->createAdmitCard();
        $admitCard = AdmitCard::first();
        $this->assertNotNull($admitCard);
        
        $this->actingAs($this->admin())->delete($admitCard->url);
        $this->assertNull(AdmitCard::first());
    }

    public function test_admitCard_edit_form_can_be_rendered(){
        $admitCard = $this->createAdmitCard();
        $response = $this->actingAs($this->admin())->get($admitCard->edit_url);
        $response->assertViewIs(AdmitCard::editView());
        $response->assertViewHas(['admitCard'=>$admitCard]);
    }
    public function test_admitCard_can_be_updated(){

        $admitCard = $this->createAdmitCard();
        $this->assertNotNull($admitCard);

        $response = $this->actingAs($this->admin())->put($admitCard->url, $this->data([
            'applicant_id'=> 2,
        ]));

        $admitCard = AdmitCard::first();
        $this->assertEquals($admitCard->applicant_id, 2);
        $response->assertRedirect($admitCard->url);
    }

    public function test_applicant_can_download_admit_card(){
        $applicant = Applicant::factory()->create();
        $this->assertNull($applicant->admitCard);
        AdmitCard::create([
            'applicant_id'=> $applicant->id,
            'center_id'=> Center::factory()->create()->id,
        ]);

        $applicant = Applicant::findOrFail($applicant->id);
        $admitCard = $applicant->admitCard;
        $this->assertNotNull($admitCard);

        $response = $this->actingAs($this->admin())->get('admitCard/download/'.$admitCard->id);
        $response->assertOk();
    }

    private function deleteImage($admitCard): void{
        $this->assertFileExists(AdmitCard::getImageDirectory().'/'.$admitCard->image);
        $admitCard->removeImage();
        $this->assertFileDoesNotExist(AdmitCard::getImageDirectory().'/'.$admitCard->image);
    }


    private function createAdmitCard(){
        return AdmitCard::create($this->data());
    }

    private function data($update=[]){
        return array_merge([
            'applicant_id'=> 1,
            'center_id'=> 1,
            'room_number'=> 1,
            'sit_number'=> 101,
            'image'=> UploadedFile::fake()->image('signature.jpg'),
        ], $update);
    }
}
