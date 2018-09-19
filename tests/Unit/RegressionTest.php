<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegressionTest extends TestCase
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
        $user->settings->die_hard = true;
        $user->settings->cups_of_coffee_per_day = 17;

        $user->save();

        $user->refresh();

        $this->assertInstanceOf(\App\User::class, $user);
        $this->assertTrue($user->settings->hero_mode);
        $this->assertTrue($user->settings->die_hard);
        $this->assertEquals($user->settings->cups_of_coffee_per_day, 17);
    }

    public function test_it_can_json_export_a_model_with_schemaless_attributes()
    {
        $user = User::create(['email' => 'example@example.com', 'name' => 'Test User', 'password' => bcrypt('test')]);

        $user->settings->hero_mode = true;
        $user->settings->die_hard = true;
        $user->settings->cups_of_coffee_per_day = 17;

        $user->save();

        $user->refresh();

        $export = $user->exportToJson();

        $jsonObject = json_decode($export);

        $this->assertInternalType('string', $export);
        $this->assertTrue($jsonObject->settings->hero_mode);
        $this->assertTrue($jsonObject->settings->die_hard);
        $this->assertEquals($jsonObject->settings->cups_of_coffee_per_day, 17);
    }
}
