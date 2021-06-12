<?php

namespace Tests\Feature\Backend;

use Tests\Traits\Admin;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BackendPagesTest extends TestCase
{
    use DatabaseMigrations, Admin;

    public function test_members_page_can_be_rendered(){
        $this->withoutExceptionHandling();
        $this->actingAs($this->admin())->get('backend/members')->assertOk();
    }

    public function test_advisors_page_can_be_rendered(){
        $this->actingAs($this->admin())->get('backend/advisors')->assertOk();
    }

    public function test_notice_page_can_be_rendered(){
        $this->actingAs($this->admin())->get('backend/notice')->assertOk();
    }

    public function test_publications_page_can_be_rendered(){
        $this->actingAs($this->admin())->get('backend/publications')->assertOk();
    }
}
