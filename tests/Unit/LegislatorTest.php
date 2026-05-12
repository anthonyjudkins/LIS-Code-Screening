<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Legislator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LegislatorTest extends TestCase
{
    use RefreshDatabase;

    public function test_legislator_can_be_created()
    {
        $legislator = Legislator::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'hometown' => 'Testville',
        ]);

        $this->assertDatabaseHas('legislators', [
            'first_name' => 'Test',
            'last_name' => 'User',
            'hometown' => 'Testville',
        ]);
    }
}
