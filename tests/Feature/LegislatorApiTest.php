<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Legislator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LegislatorApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_legislators_api_returns_legislators()
    {
        Legislator::factory()->count(2)->create();

        $response = $this->get('/api/legislators');
        $response->assertStatus(200);
        $response->assertJsonCount(2);
    }
}
