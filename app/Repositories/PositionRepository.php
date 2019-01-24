<?php

namespace App\Repositories;

use App\Models\Position;
use Illuminate\Support\Facades\DB;

class PositionRepository
{
    public function countPositions($positionIds = []): int
    {
        $result = Position::whereIn('id', $positionIds)
            ->select(DB::raw("count(id) as existing_positions"))
            ->first();

        return (int)$result->existing_positions;
    }
}