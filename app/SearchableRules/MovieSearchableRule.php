<?php


namespace App\SearchableRules;



use App\Services\Searchable\ByColumnSearchable;

class MovieSearchableRule implements ByColumnSearchable
{

    public function searchableColumns(): array
    {
       return  [
           'title',
           'description',
       ];
    }
}
