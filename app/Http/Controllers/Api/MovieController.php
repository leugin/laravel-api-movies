<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreMovieRequest;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use App\SearchableRules\Movie\MovieOptionsRule;
use App\Services\Searchable\Searchable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Leugin\ApiResponse\Helpers\ApiResponse;

/**
 * Class MovieController
 * @package App\Http\Controllers\Api
 */
class MovieController extends Controller
{

    /**
     * @var Movie
     */
    public $repository;
    /**
     * @var Searchable
     */
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

    /**@param
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $query = $this->repository->newQuery();
        $this->searchableService->applyArray($query, new MovieOptionsRule(), $request->all());
        return ApiResponse::collection(MovieResource::collection($query->paginate(20)));
    }

    /**
     * @param StoreMovieRequest $request
     * @return JsonResponse
     */
    public function store(StoreMovieRequest $request)
    {
        $movie = $this->repository->newQuery()->create($request->validated());
        return ApiResponse::created(new MovieResource($movie));
    }

    /**
     * @param Movie $movie
     * @param StoreMovieRequest $request
     * @return JsonResponse
     */
    public function update(Movie $movie, StoreMovieRequest $request)
    {
        $movie->update($request->validated());
        return ApiResponse::created(new MovieResource($movie));
    }

    /**
     * @param Movie $movie
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return ApiResponse::success(new MovieResource($movie));
    }

    /**
     * @param Movie $movie
     * @return JsonResponse
     */
    public function show(Movie $movie)
    {
        return ApiResponse::success(new MovieResource($movie));
    }
}
