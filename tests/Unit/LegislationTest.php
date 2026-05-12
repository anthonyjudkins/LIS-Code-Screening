<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Legislator;
use App\Models\Legislation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LegislationTest extends TestCase
{
    use RefreshDatabase;

    public function test_legislation_can_be_created_with_sponsors()
    {
        $legislator = Legislator::factory()->create();
        $legislation = Legislation::create([
            'title' => 'Test Bill',
            'text' => 'Test text',
        ]);
        $legislation->legislators()->attach($legislator->id);

        $this->assertDatabaseHas('legislations', ['title' => 'Test Bill']);
        $this->assertTrue($legislation->legislators->contains($legislator));
    }
}
