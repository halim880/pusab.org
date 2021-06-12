<?php

namespace Tests\Feature\Backend;

use App\Http\Controllers\AdvisorSignupController;
use App\Models\Advisor;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AdvisorSignupTest extends TestCase
{
   use DatabaseMigrations;

   public function test_advisor_can_be_registered(){
       $this->withoutExceptionHandling();

       $this->post('advisor/register', [
            'name'=> 'Nayeem',
            'email'=> 'advisor@gmail.com',
            'password'=> 'password',
            'password_confirmation'=> 'password',
            'profession'=> 'Doctor',
            'institution'=> 'Shahjalal university',
            'department'=> 'Computer Science & Engineering',
            'passing_year'=> 1999,
            'job_title'=> 'Lecturer (Bangla)',
            'job_location'=> 'Digendra Barman Degree college',
            'phone'=> '01743920880',
            'image'=> UploadedFile::fake()->image('advisor.jpg'),
        ]);

        $this->assertTrue(User::all()->count()==1);
        $this->assertTrue(Advisor::all()->count()==1);

        $advisor = Advisor::first();
        $user = User::first();
        
        $this->assertFileExists(Advisor::getImageDirectory().'/'.$advisor->image);
        $this->assertEquals($advisor->name, $user->name);
        $this->assertEquals($advisor->email, $user->email);
        @unlink(Advisor::getImageDirectory().'/'.$advisor->image);
        $this->assertFileDoesNotExist(Advisor::getImageDirectory().'/'.$advisor->image);
   }
}
