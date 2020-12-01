<?php


namespace App\Services\Searchable;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class EloquentSorteableColumns implements ApplicableOptions
{
    private $eloquent;
    private $searchableRules;

    /**
     * EloquentSearchColumns constructor.
     * @param Model|ByColumnOptions|Builder $eloquent
     * @param $searchableRules
     * @throws \Exception
     */
    public function __construct($eloquent, ?ByColumnOptions $searchableRules )
    {
        $this->eloquent = $eloquent;
        $this->searchableRules = $searchableRules;
    }


    public function apply($value){
        $columns = $this->searchableRules->optionsByColumns();
        $query = $this->eloquent;
        if(is_string($value) && in_array($value, $columns)){
            return $query->orderBy($value);
        }
        if (is_array($value) && array_key_exists('column', $value) && array_key_exists('direction', $value) && in_array($value['column'], $columns)) {
            return $query->orderBy($value['column'], $value['direction']);
        }

        return $query;
    }


}
