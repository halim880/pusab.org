<?php

namespace Tests\Feature;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Tests\Traits\Admin;
use Tests\Traits\HasImage;

class ActivityTest extends TestCase
{
    use DatabaseMigrations, Admin, HasImage;

    public function setUp():void{
        parent::setUp();

        $this->withoutExceptionHandling();
    }


    public function test_admin_can_store_a_new_activity(){
        $this->actingAs($this->admin())->post('backend/activities', [
            'title'=> 'This is a title',
            'description'=> 'This is the description of the activity',
            'time'=> Carbon::today()->subDays(5),
            'image'=>UploadedFile::fake()->image('random.jpg'),
        ]);

        $activity = Activity::first();
        $this->assertNotNull($activity);
        $this->assertEquals($activity->title, 'This is a title');
        $this->assertEquals($activity->description, 'This is the description of the activity');
        $this->deleteImage(Activity::getImageDirectory().'/'.$activity->image);
    }

}
