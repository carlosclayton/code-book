<?php

namespace CodeEduBook\Criteria;

use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByAuthorCriteriaCriteria
 * @package namespace CodeEditora\Criteria;
 */
class FindByAuthorCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {


        if(!\Auth::user()->can(config('codeedubook.acl.permissions.name') . "/"  . config('codeedubook.acl.permissions.resource_name'))){
            return $model->where('author_id', \Auth::user()->id);
        }
        return $model;

    }
}
