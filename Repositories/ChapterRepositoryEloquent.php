<?php

namespace CodeEduBook\Repositories;

use CodeEduBook\Criteria\CriteriaTrashedTrait;
use CodeEduBook\Criteria\OnlyTrashedTrait;
use CodeEduBook\Models\Chapter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;


/**
 * Class BookRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ChapterRepositoryEloquent extends BaseRepository implements ChapterRepository
{
    use CriteriaTrashedTrait;
    use RepositoryRestoreTrait;

    protected $fieldSearchable = ['title' =>'like', 'author.name' =>'like'];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Chapter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
