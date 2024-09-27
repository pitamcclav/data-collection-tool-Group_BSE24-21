<?php

//namespace Tests\Unit;
use App\Models\User;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }

    public function login_test()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_get_all_users()
    {
        $user = User::factory()->create(
            ['type' => '1'] // Assuming you have a role or similar mechanism
        ); // Create a user
        $response = $this->actingAs($user)->get('/user'); // Simulate logged-in user
        $response->assertStatus(200);
    }

    public function test_get_all_posts()
    {
        $user = User::factory()->create(
            ['type' => '0'] // Assuming you have a role or similar mechanism
        ); // Create a user
        $response = $this->actingAs($user)->get('/posts'); // Simulate logged-in user
        $response->assertStatus(200);
    }

    public function test_dashboard()
    {
        $user = User::factory()->create([
            'type' => '0', // Assuming you have a role or similar mechanism
        ]);
        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
    }

    public function test_admin_dashboard()
    {
        $admin = User::factory()->create([
            'type' => '1', // Assuming you have a role or similar mechanism
        ]);
        $response = $this->actingAs($admin)->get('/admin/home');
        $response->assertStatus(200);
    }

    public function test_new_post()
    {
        $user = User::factory()->create([
            'type' => '0', // Assuming you have a role or similar mechanism
        ]);
        $response = $this->actingAs($user)->get('/posts/new');
        $response->assertStatus(200);

    }

    public function test_new_admin_post()
    {
        $admin = User::factory()->create([
            'type' => '1', // Assuming you have a role or similar mechanism
        ]);
        $response = $this->actingAs($admin)->get('/admin/posts/new');
        $response->assertStatus(200);

    }
}
