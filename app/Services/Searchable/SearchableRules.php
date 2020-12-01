<?php


namespace App\Services\Searchable;


trait SearchableRules
{
    public function queryRules():array{
        return [
            'search'=> new QueryColumnOption($this->searchableByColumns()),
            'order_by'=>new QueryColumnOption($this->sorteableColumns())
        ];
    }

    public abstract  function searchableByColumns():array;
    public abstract  function sorteableColumns():array;
}
