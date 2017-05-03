<?php

namespace CodeEduBook\Repositories;

use CodeEduBook\Criteria\CriteriaTrashedTraitInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CategoryRepository
 * @package namespace App\Repositories;
 */
interface CategoryRepository extends RepositoryInterface, CriteriaTrashedTraitInterface
{
    public function listsWithMutators($colums, $keys = null);
}
