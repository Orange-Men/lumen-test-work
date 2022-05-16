<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class CompanyService
 * @package App\Service
 */
class CompanyService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Company::query()->where('user_id', auth()->id())->get();
    }

    /**
     * @param Request $request
     * @return Model
     */
    public function create(Request $request): Model
    {
        return Company::query()->create([
            'title' => $request->title,
            'phone' => $request->phone,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);
    }
}
