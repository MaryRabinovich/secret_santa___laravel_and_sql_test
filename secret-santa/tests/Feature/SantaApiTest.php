<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\SantaRelationSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SantaApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() :void
    {
        parent::setUp();

        $this->seed(UserSeeder::class);
        $this->seed(SantaRelationSeeder::class);

        $this->response = $this->get('/api/santa/1');
    }

    /** @test */
    public function it_is_accessible()
    {
        $this->response->assertStatus(200);
    }

    /** @test */
    public function it_returns_correct_santa_info()
    {
        $this->response->assertJson([
            'santa' => [
                'id' => 1
            ]
        ]);
    }

    /** @test */
    public function it_returns_correct_client_info()
    {
        $santa = User::find(1);

        $clientID = $santa->santaClient()->first()->id;

        $this->response->assertJson([
            'client' => [
                'id' => $clientID
            ]
        ]);
    }
}
