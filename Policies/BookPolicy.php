<?php

namespace CodeEduBook\Policies;

use CodeEduUser\Models\User;
use CodeEduBook\Models\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if($user->can(config('codeedubook.acl.permissions.name') . "/"  . config('codeedubook.acl.permissions.resource_name'))){
            return true;
        }
    }

    /**
     * @param User $user
     * @param Book $book
     */
    public function update(User $user, Book $book)
    {
        return $user->id == $book->author_id;
    }

}
