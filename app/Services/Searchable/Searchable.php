<?php


namespace App\Services\Searchable;



class Searchable
{
    public function applyArray(&$query, ByColumnSearchable $byColumnSearchable, array $options = [])
    {
        return  (new EloquentSearchColumns($query,  $byColumnSearchable))
            ->apply($options);
    }
}
