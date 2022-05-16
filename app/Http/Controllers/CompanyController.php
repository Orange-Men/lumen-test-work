<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Service\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{
    /**
     * CompanyController constructor.
     */
    public function __construct(private CompanyService $companyService)
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CompanyResource::collection($this->companyService->index());
    }

    /**
     * @param Request $request
     * @return CompanyResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): CompanyResource
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        return new CompanyResource($this->companyService->create($request));
    }
}
