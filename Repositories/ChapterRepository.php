<?php

namespace CodeEduBook\Repositories;


use CodeEduBook\Criteria\CriteriaTrashedTraitInterface;
use CodeEduBook\Criteria\OnlyTrashedTraitInterface;
use Prettus\Repository\Contracts\RepositoryCriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BookRepository
 * @package namespace App\Repositories;
 */
interface ChapterRepository extends
    RepositoryInterface,
    RepositoryCriteriaInterface,
    CriteriaTrashedTraitInterface,
    RepositoryRestoreInterface
{

}
