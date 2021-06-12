<?php

namespace Tests\Unit;

use App\Models\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SchoolTest extends TestCase
{
    use DatabaseMigrations;

    public function test_school_can_be_created(){
        School::create([
            'name'=> 'Ratar Gaon high school',
            'union'=> 'soluka bad',
        ]);

        $this->assertNotNull(School::first());
    }
}
