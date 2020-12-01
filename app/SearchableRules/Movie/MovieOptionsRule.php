<?php


namespace App\SearchableRules\Movie;

use App\Services\Searchable\QueryColumnOption;
use App\Services\Searchable\QueryRules;

class MovieOptionsRule implements QueryRules
{

    public function queryRules():array{
        return [
            'search'=> new QueryColumnOption($this->searchableByColumns()),
            'order_by'=>new QueryColumnOption($this->sorteableColumns())
        ];
    }
    public function searchableByColumns(): array
    {
       return  [
           'title',
           'description',
       ];
    }

    public function sorteableColumns(): array
    {
       return  [
           'id',
           'title',
           'description',
       ];
    }
}
