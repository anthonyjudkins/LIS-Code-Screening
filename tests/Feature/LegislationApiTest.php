<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Legislator;
use App\Models\Legislation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LegislationApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_legislations_api_returns_legislations_with_sponsors()
    {
        $legislator = Legislator::factory()->create([
            'first_name' => 'Alice',
            'last_name' => 'Smith',
        ]);
        $legislation = Legislation::create([
            'title' => 'Test Bill',
            'text' => 'Test text',
        ]);
        $legislation->legislators()->attach($legislator->id);

        $response = $this->get('/api/legislations');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'title' => 'Test Bill',
            'text' => 'Test text',
        ]);
        $response->assertJsonFragment([
            'first_name' => 'Alice',
            'last_name' => 'Smith',
        ]);
    }
}
