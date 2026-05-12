<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLegislatorRequest;
use App\Services\LegislatorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class LegislatorController extends Controller
{
    protected LegislatorService $service;

    public function __construct(LegislatorService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the legislators.
     *
     * @return JsonResponse
     */
    public function get(): JsonResponse
    {
        return response()->json($this->service->all());
    }

    /**
     * Store a newly created legislator in storage.
     *
     * @param StoreLegislatorRequest $request
     * @return RedirectResponse
     */
    public function create(StoreLegislatorRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());
        return redirect('/legislators');
    }
}
