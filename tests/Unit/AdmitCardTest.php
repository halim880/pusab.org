<?php

namespace Tests\Unit;

use App\Models\AdmitCard;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AdmitCardTest extends TestCase
{
    use DatabaseMigrations;
    
    public function test_admit_card_can_be_created(){
        $this->withoutExceptionHandling();
        AdmitCard::create([
            'applicant_id'=> 1,
            'center_id'=> 1,
            'exam_id'=> 1,
            'room_number'=> 1,
            'sit_number'=> 101,
            'image'=> 'signature.jpg',
        ]);

        $this->assertNotNull(AdmitCard::first());
    }
}
