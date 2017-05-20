<?php

namespace CodeEduBook\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;

class Chapter extends Model implements Transformable, TableInterface
{
    protected $fillable = ['chapter', 'content', 'order', 'book_id'];


    public function book(){
        return $this->belongsTo(Book::class);
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['#', 'Chapter'];
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
            case 'Chapter':
                return $this->chapter;


        }
    }

    /**
     * @return array
     */
    public function transform()
    {
        // TODO: Implement transform() method.
    }
}
