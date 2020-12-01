<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use App\SearchableRules\Movie\MovieOptionsRule;
use App\Services\Searchable\Searchable;
use Illuminate\Http\Request;
use Leugin\ApiResponse\Helpers\ApiResponse;

class MovieController extends Controller
{

    public $repository;
    public $searchableService;

    /**
     * MovieController constructor.
     * @param Movie $repository
     * @param Searchable $searchableService
     */
    public function __construct(Movie $repository, Searchable $searchableService)
    {
        $this->repository = $repository;
        $this->searchableService = $searchableService;
    }


    public function index(Request $request)
    {
        $query = $this->repository->newQuery();
        $this->searchableService->applyArray($query, new MovieOptionsRule(), $request->all());
        return ApiResponse::collection(MovieResource::collection($query->paginate(20)));
    }
}
