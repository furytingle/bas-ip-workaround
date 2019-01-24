<?php

namespace App\Rules;

use App\Repositories\PositionRepository;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class PositionsRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $repository = new PositionRepository();
        $positionsIds = [];
        foreach ($value as $item) {
            if (!isset($item['salary']) || empty($item['salary'])) {
                return false;
            }
            $positionsIds[] = $item['id'];
        }
        $positions = $repository->countPositions($positionsIds);

        return count($value) === $positions;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid positions set';
    }
}
