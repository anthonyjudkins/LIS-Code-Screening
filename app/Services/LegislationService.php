<?php
namespace App\Services;

use App\Models\Legislation;
use Illuminate\Support\Collection;

class LegislationService
{
    /**
     * Get all legislations with their sponsors.
     *
     * @return Collection
     */
    public function allWithSponsors(): Collection
    {
        return Legislation::with('legislators')->get()->map(function ($legislation) {
            return [
                'id' => $legislation->id,
                'title' => $legislation->title,
                'text' => $legislation->text,
                'sponsors' => $legislation->legislators->map(function ($legislator) {
                    return [
                        'id' => $legislator->id,
                        'first_name' => $legislator->first_name,
                        'last_name' => $legislator->last_name,
                        'hometown' => $legislator->hometown,
                    ];
                }),
            ];
        });
    }

    /**
     * Create a new legislation and associate it with sponsors.
     *
     * @param array $data
     * @return Legislation
     */
    public function create(array $data): Legislation
    {
        $legislation = Legislation::create([
            'title' => $data['title'],
            'text' => $data['text'],
        ]);
        if (!empty($data['sponsors'])) {
            $legislation->legislators()->sync($data['sponsors']);
        }
        return $legislation;
    }
}