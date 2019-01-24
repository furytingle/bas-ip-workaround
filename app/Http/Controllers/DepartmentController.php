<?php

namespace App\Http\Controllers;

use App\Repositories\DepartmentRepository;
use App\Traits\ApiResponseTrait;

class DepartmentController extends Controller
{
    use ApiResponseTrait;

    protected $repository;

    public function __construct()
    {
        $this->repository = new DepartmentRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->successResponse($this->repository->all());
    }

    public function report()
    {
        $report = $this->repository->makeReport();
        return $this->successResponse($report);
    }
}
