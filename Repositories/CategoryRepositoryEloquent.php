<?php

namespace CodeEduBook\Repositories;

use CodeEduBook\Criteria\CriteriaTrashedTrait;
use CodeEduBook\Criteria\CriteriaTrashedTraitInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeEduBook\Models\Category;


/**
 * Class CategoryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    use BaseRepositoryTrait;
    use CriteriaTrashedTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    /**
     * @param $colums
     * @param null $keys
     */
    public function listsWithMutators($colums, $keys = null)
    {
        $collection = $this->all();
        return $collection->pluck($colums, $keys);
    }
}
