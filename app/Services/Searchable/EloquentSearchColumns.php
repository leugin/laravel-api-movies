<?php


namespace App\Services\Searchable;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class EloquentSearchColumns implements ApplicableOptions
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

    public function apply($values = []){
        $columns = $this->searchableRules->optionsByColumns();
        $query = $this->eloquent;
        foreach ($values as $key => $value) {
            if (array_key_exists($key, $columns)) {
                $this->filterByColumn($query, $key, $value, $columns[$key]);
            } elseif (in_array($key, $columns)) {
                $this->filterByColumn($query, $key, $value);
            }
        }
        return $query;
    }

    /**
     * @
     * @param $query
     * @param $key
     * @param $value
     * @param null $column
     * @return mixed
     */
    private function filterByColumn($query, $key, $value, $column = null)
    {
        if (is_null($column)) {
            $query->where($key, 'like', "%$value%");
        } else {
            if (is_callable($column)) {
                $column($query, $value, $key);
            } elseif (is_array($column)) {
                $columnName = array_key_exists('column', $column) ? $column['column'] : $key; // name
                $value = array_key_exists('value', $column) ? $column['value'] : $value; // sss
                $condition = array_key_exists('condition', $column) ? $column['condition'] : 'like';
                $query->where($columnName, $condition, $value);
            }
        }

        return $query;
    }

}
