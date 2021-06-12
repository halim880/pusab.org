<?php

namespace Tests\Feature\Backend;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Tests\Traits\Admin;

class RolesTest extends TestCase{
    use DatabaseMigrations;
    use Admin;

    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function test_roles_create_page_can_be_rendered(){
        $response = $this->actingAs($this->admin())->get('backend/roles/create');
        $response->assertOk();
        $response->assertViewIs('backend.role.create');
    }

    public function test_admin_can_create_a_role(){
        $role = ['name'=> 'executive'];

        $response = $this->actingAs($this->admin())->post('backend/roles', $role);
        $response->assertRedirect('backend/roles');
        $role = Role::where('name', 'executive')->first();
        $this->assertNotNull($role);
        $this->assertEquals($role->name, 'executive');
    }

    public function test_roles_list_can_be_seen(){
        $response = $this->actingAs($this->admin())->get('backend/roles');
        $response->assertViewIs('backend.role.index');
        $response->assertViewHas('roles');
        $response->assertSee('admin');
    }

    public function test_roles_edit_page_can_be_rendered(){
        $role = Role::create(['name'=> 'executive']);
        $response = $this->actingAs($this->admin())->get('backend/roles/'.$role->id.'/edit');
        $response->assertOk();
        $response->assertViewIs('backend.role.edit');
        $response->assertViewHas('role');
    }

    public function test_admin_can_update_a_role(){
        
        $role = Role::create(['name'=> 'executive']);

        $response = $this->actingAs($this->admin())->put('backend/roles/'.$role->id, [
            'name'=> 'president'
        ]);
        $response->assertRedirect('backend/roles');
        $role = Role::where('name', 'president')->first();
        $this->assertNotNull($role);
        $this->assertEquals($role->name, 'president');
    }

    public function test_admin_can_delete_a_role(){
        
        $role = Role::create(['name'=> 'executive']);

        $response = $this->actingAs($this->admin())->delete('backend/roles/'.$role->id);
        $response->assertRedirect('backend/roles');
        $role = Role::where('name', 'executive')->first();
        $this->assertNull($role);
    }
}