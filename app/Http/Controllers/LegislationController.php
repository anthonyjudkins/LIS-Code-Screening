<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLegislationRequest;
use App\Services\LegislationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LegislationController extends Controller
{
    protected LegislationService $service;

    public function __construct(LegislationService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the legislations with sponsors.
     *
     * @return JsonResponse
     */
    public function get(): JsonResponse
    {
        return response()->json($this->service->allWithSponsors());
    }

    /**
     * Store a newly created legislation in storage.
     *
     * @param StoreLegislationRequest $request
     * @return RedirectResponse
     */
    public function create(StoreLegislationRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());
        return redirect('/legislations');
    }
}
