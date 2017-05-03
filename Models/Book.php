<?php

namespace CodeEduBook\Models;

use Bootstrapper\Interfaces\TableInterface;
use CodeEduUser\Models\User;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Book extends Model implements Transformable, TableInterface
{
    use TransformableTrait, FormAccessible, SoftDeletes;
    protected $fillable = ['title', 'subtitle', 'price', 'author_id'];
    protected $dates = ['deleted_at'];

    /**
     * @return array
     */
    public function transform()
    {
        // TODO: Implement transform() method.
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['#', 'Title', 'Author', 'Price'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch($header){
            case '#':
                return $this->id;
            case 'Author':
                return $this->author->name;
            case 'Title':
                return $this->title;
            case 'Price':
                return $this->price;
        }
    }


    public function author(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class)->withTrashed();
    }


    public function formCategoriesAttribute(){
        return $this->categories->pluck('id')->all();
    }

}
