<?php

namespace CodeEduBook\Providers;

use CodeEduBook\Models\Book;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use CodeEduBook\Policies\BookPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Book::class => BookPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*
        \Gate::define('update-book', function ($user, $book) {
            return $user->id == $book->author_id;
        });
        */

    }
}
