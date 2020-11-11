<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Leugin\ApiResponse\Helpers\ApiResponse;

class MovieController extends Controller
{

    public $repository;

    /**
     * MovieController constructor.
     * @param $repository
     */
    public function __construct(Movie $repository)
    {
        $this->repository = $repository;
    }


    public function index(Request $request)
    {
        $query = $this->repository->paginate(perPage($request->all()));
        return ApiResponse::collection(MovieResource::collection($query));
    }
}
