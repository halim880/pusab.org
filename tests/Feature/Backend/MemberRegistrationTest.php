<?php

namespace Tests\Feature\Backend;

use App\Models\Member;
use App\Models\User;
use App\Notifications\MemberRequestNotification;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Tests\Traits\Admin;

class MemberRegistrationTest extends TestCase
{
    use DatabaseMigrations;
    use Admin;
    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();
        Storage::fake(Member::IMAGE_DIRECTORY);
        Role::create(['name'=> 'member']);
        Notification::fake();
        Event::fake();
    }

    public function test_member_can_be_store_to_the_database(){
        $data = $this->data();
        $this->post('member/register', $data);
        $this->assertTrue(User::all()->count()==1);
        $this->assertTrue(Member::all()->count()==1);
        $member = Member::first();
        $user = User::first();
        $this->assertEquals($member->name, $user->name);
        $this->assertEquals($member->email, $user->email);
        $this->deleteImage();
    }

    public function test_notification_is_send_to_admin_when_member_is_requested(){
        $data = $this->data();
        Role::create(['name'=> 'admin']);

        $user = User::factory()->create();
        
        $user->assignRole('admin');

        $this->post('member/register', $data);
        // $this->assertTrue(User::all()->count()==1);
        // $this->assertTrue(Member::all()->count()==1);

        Notification::assertSentTo($user, MemberRequestNotification::class);

        $this->deleteImage();
    }

    public function deleteImage(){
        $member = Member::first();
        $this->assertFileExists(Member::getImageDirectory().'/'.$member->image);
        @unlink(Member::getImageDirectory().'/'.$member->image);
        $this->assertFileDoesNotExist(Member::getImageDirectory().'/'.$member->image);
    }

    public function data(){
        return [
            'name'=> 'Shohidullah Kaisar',
            'email'=> 'a.halimics@gmail.com',
            'password'=> 'password',
            'father_name'=> 'Enayet Ullah',
            'mother_name'=> 'Kulsuma Khatun',
            'institution'=> 'Sylhet Engineering College',
            'department'=> 'Echonomics',
            'session'=> '2015-2016',
            'college'=> 'Modon Mohan College, Sylhet',
            'high_school'=> 'HMP High School, Sunamgonj',
            'blood_group'=> 'A+',
            'village'=>'Kachir Gati',
            'post_office'=>'Polash',
            'union'=>'Polash',
            'current_address'=> 'Maktab goli, Chittagong',
            'phone'=> '01714 870178',
            'image'=> UploadedFile::fake()->image('random.jpeg'),
        ];
    }
}
