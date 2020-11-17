<?php


namespace App\Services\Searchable;


interface SearchByColumn
{

    public function applyFilterByColumn($key, $value, $column = null);

}
