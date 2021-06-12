<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Spatie\Permission\Models\Role;

class RolesTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_role_can_be_created()
    {
        Role::create([
            'name'=> 'admin'
        ]);

        $this->assertTrue(Role::first()->name=='admin');
    }
}
