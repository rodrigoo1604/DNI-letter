<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\DniLetter;
use Database\Seeders\DniLettersSeeder;

class DniTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DniLettersSeeder::class);
    }

    /** @test */
    public function it_returns_an_error_if_dni_is_invalid()
    {
        $response = $this->postJson('/api/calculate-dni-letter', ['dni' => "123"]);
        
        $response->assertStatus(400)
                 ->assertJson(['error' => 'Insert a valid dni']);
    }

    /** @test */
    public function it_calculates_the_correct_letter()
    {
        $response = $this->postJson('/api/calculate-dni-letter', ['dni' => "12345678"]);
        
        $response->assertStatus(200)
                 ->assertJson([
                     'dni' => "12345678",
                     'letter' => DniLetter::where('index', 12345678 % 23)->value('letter'),
                 ]);
    }

    /** @test */
    public function it_returns_an_error_if_dni_is_a_string()
    {
        $response = $this->postJson('/api/calculate-dni-letter', ['dni' => "invalidDNI"]);
        
        $response->assertStatus(400)
                 ->assertJson(['error' => 'Insert a valid dni']);
    }
}

