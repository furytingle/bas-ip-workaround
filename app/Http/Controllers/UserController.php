<?php

namespace App\Http\Controllers;

use App\DTO\PositionDTO;
use App\DTO\UserDTO;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponseTrait;

    protected $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateUserRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateUserRequest $request)
    {
        $userDTO = new UserDTO();
        $userDTO->setName($request->get('name'));
        $userDTO->setEmail($request->get('email'));

        foreach ($request->get('positions') as $position) {
            $positionDTO = new PositionDTO();
            $positionDTO->setId($position['id']);
            $positionDTO->setSalary($position['salary']);
            $userDTO->addPosition($positionDTO);
        }

        $userId = $this->repository->create($userDTO);

        return $this->successResponse([
            'id' => $userId
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $user = $this->repository->get($id);

        return $this->successResponse($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $userDTO = new UserDTO();
        $userDTO->setId($id);
        $userDTO->setName($request->get('name'));

        foreach ($request->get('positions') as $position) {
            $positionDTO = new PositionDTO();
            $positionDTO->setId($position['id']);
            $positionDTO->setSalary($position['salary']);
            $userDTO->addPosition($positionDTO);
        }

        $userId = $this->repository->update($userDTO);

        return $this->successResponse([
            'id' => $userId
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
