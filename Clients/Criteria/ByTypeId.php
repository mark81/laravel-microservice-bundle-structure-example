<?php

namespace App\Clients\Criteria;

use App\Contracts\CriterionInterface;
use Illuminate\Database\Eloquent\Builder;

class ByTypeId implements CriterionInterface
{
    /**
     * @var int
     */
    private $typeId;

    /**
     * BytypeId constructor
     * @param int $typeId
     */
    public function __construct(int $typeId)
    {
        $this->typeId = $typeId;
    }

    /**
     * Apply constraints to a Query builder
     *
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder): Builder
    {
        return $builder->where('type_id', $this->typeId);
    }
}
