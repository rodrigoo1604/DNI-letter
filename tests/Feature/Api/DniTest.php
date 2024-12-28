<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\DniLetter;
use Database\Seeders\DniLettersSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DniTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed the database with DNI letters
        $this->seed(DniLettersSeeder::class);
    }

    /** @test */
    public function it_returns_the_correct_letter_for_a_valid_dni()
    {
        $dni = 12345678;
        $expectedLetter = DniLetter::where('index', $dni % 23)->value('letter');

        $response = $this->postJson('/api/calculate-dni-letter', [
            'dni' => $dni,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'dni' => $dni,
                'letter' => $expectedLetter,
            ]);
    }

    /** @test */
    public function it_returns_an_error_for_an_invalid_dni()
    {
        $response = $this->postJson('/api/calculate-dni-letter', [
            'dni' => 'invalid-dni',
        ]);

        $response->assertStatus(422) // Unprocessable Entity
            ->assertJsonValidationErrors(['dni']);
    }

    /** @test */
    public function it_handles_dni_out_of_range()
    {
        $response = $this->postJson('/api/calculate-dni-letter', [
            'dni' => 100000000, // Número fuera del rango permitido
        ]);

        $response->assertStatus(422) // Unprocessable Entity
            ->assertJsonValidationErrors(['dni']);
    }
}
