<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\SayorPost;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SayorPostTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();

    }
    public function test_post_create_page_can_be_rendered(){
        $response = $this->get('sayor-post/create');
        $response->assertOk();
        $response->assertViewIs('pages.sayorpost.create');
    }

    public function test_post_can_be_retrived_and_show(){
        $post = SayorPost::factory()->create();
        $response = $this->get('sayor-post/show/'.$post->id);
        $response->assertOk();
        $response->assertViewIs('pages.sayorpost.show');
        $response->assertViewHas('post');        
    }

    public function test_user_can_create_post_to_sayor(){
        
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('sayor-post/store', [
            'category_id'=> 1,
            'title'=> 'This is the title',
            'body'=> 'This is the post body, of the sayor post i know',
        ]);
        $response->assertRedirect('pages/publications');
        $post = SayorPost::first();
        $this->assertEquals($post->category_id, 1);
        $this->assertEquals($post->title, 'This is the title');
        $this->assertEquals($post->body, 'This is the post body, of the sayor post i know');
    }
}
