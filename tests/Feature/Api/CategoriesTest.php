<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_category()
    {
        $user = _test_user();

        $attributes = [
            'name' => 'Network Equipments',
            'description' => 'Lorem ipsum dolor sit amet',
        ];

        $this->post(route('api.categories.store'), array_merge($attributes, [
            'auth_token' => $user->auth_token
        ]))
            ->assertStatus(201)
            ->assertJson($attributes);
    }
}
