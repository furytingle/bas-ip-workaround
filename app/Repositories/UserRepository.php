<?php

namespace App\Repositories;

use App\DTO\UserDTO;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function all()
    {
        $result = User::with('positions')
            ->select('id', 'name', 'email')
            ->get();

        return $result;
    }

    public function get($id) {
        $user = User::where('id', $id)
            ->with('positions')
            ->select('id', 'name', 'email')
            ->first();

        return $user;
    }

    public function create(UserDTO $dto): int
    {
        $user = new User();
        $user->name = $dto->getName();
        $user->email = $dto->getEmail();

        $positions = [];
        foreach ($dto->getPositions() as $position) {
            $positions[$position->getId()] = ['salary' => $position->getSalary()];
        }

        DB::transaction(function () use ($user, $positions) {
            $user->save();
            $user->positions()->attach($positions);
        });

        return (int)$user->id;
    }

    public function update(UserDTO $dto)
    {
        $user = User::where('id', $dto->getId())->firstOrFail();

        $user->name = $dto->getName();

        $positions = [];
        foreach ($dto->getPositions() as $position) {
            $positions[$position->getId()] = ['salary' => $position->getSalary()];
        }

        DB::transaction(function () use ($user, $positions) {
            $user->save();
            $user->positions()->sync($positions);
        });

        return (int)$user->id;
    }
}