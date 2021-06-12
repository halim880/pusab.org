<?php

namespace Tests\Feature\Backend;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Tests\Traits\Admin;

class PagesTest extends TestCase
{
    use DatabaseMigrations, Admin;
    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();
    }
    public function test_home_page_can_be_rendered(){
        $response = $this->get('/')->assertOk();
        $response->assertViewIs('welcome');
        $response->assertViewHas('images');

    }

    public function test_home_page_can_be_rendered_with_home_url(){
        $response = $this->get('pages/home')->assertOk();
        $response->assertViewIs('pages.home');

    }

    public function test_contact_page_can_be_rendered(){
        $response = $this->get('pages/contact')->assertOk();
        $response->assertViewIs('pages.contact');
    }

    public function test_members_page_can_be_rendered(){
        $response = $this->get('pages/members')->assertOk();
        $response->assertViewIs('pages.members');
        $response->assertViewHas('members');
    }

    public function test_about_page_can_be_rendered(){
        $response = $this->get('pages/about')->assertOk();
        $response->assertViewIs('pages.about');
    }
    public function test_advisors_page_can_be_rendered(){
        $response = $this->actingAs($this->admin())->get('pages/advisors')->assertOk();
        $response->assertViewIs('backend.advisor.index');
    }

    public function test_notice_page_can_be_rendered(){
        $response = $this->get('pages/notice')->assertOk();
        $response->assertViewIs('pages.notice');
    }

    public function test_publications_page_can_be_rendered(){
        $response = $this->get('pages/publications')->assertOk();
        $response->assertViewIs('pages.publications');
    }
    public function test_scholarship_page_can_be_rendered(){
        $response = $this->get('pages/scholarship_exam')->assertOk();
        $response->assertViewIs('pages.scholarship_exam');
        $response->assertViewHas('exam');
    }
}
