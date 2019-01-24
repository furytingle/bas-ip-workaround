<?php

namespace App\Repositories;

use App\Models\Department;
use Illuminate\Support\Facades\DB;

class DepartmentRepository
{
    public function all()
    {
        $result = Department::with('positions')->get();

        return $result;
    }

    public function makeReport()
    {
        $result = DB::table('departments')
            ->leftJoin('positions', 'departments.id', '=', 'positions.department_id')
            ->join('users_positions', 'positions.id', '=', 'users_positions.position_id')
            ->join('users', 'users_positions.user_id', '=', 'users.id')
            ->select([
                'departments.id',
                'departments.name as department_name',
                'users.name as user_name',
                DB::raw('max(users_positions.salary) as top_salary')
            ])
            ->groupBy([
                'departments.id',
                'departments.name',
                'users.name',
            ])
            ->orderBy('top_salary', 'DESC')
            ->get();

        $grouped = [];

        foreach ($result as $item) {
            $grouped[$item->id][] = [
                'id' => $item->id,
                'department' => $item->department_name,
                'user' => $item->user_name,
                'salary' => $item->top_salary
            ];
        }

        $prepared = [];
        foreach ($grouped as $item) {
            $prepared[] = array_shift($item);
        }

        return $prepared;
    }
}