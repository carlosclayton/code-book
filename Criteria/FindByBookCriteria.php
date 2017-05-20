<?php

namespace CodeEduBook\Criteria;

use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByAuthorCriteriaCriteria
 * @package namespace CodeEditora\Criteria;
 */
class FindByBookCriteria implements CriteriaInterface
{
    private $bookId;

    /**
     * FindByBookCriteria constructor.
     * @param $bookId
     */
    public function __construct($bookId)
    {
        $this->bookId = $bookId;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('book_id', $this->bookId);
    }
}
