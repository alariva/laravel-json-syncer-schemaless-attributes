<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_can_store_a_schemaless_attribute()
    {
        $user = User::create(['email' => 'example@example.com', 'name' => 'Test User', 'password' => bcrypt('test')]);

        $user->settings->hero_mode = true;

        $this->assertInstanceOf(\App\User::class, $user);
    }
}
