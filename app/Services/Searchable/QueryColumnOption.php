<?php


namespace App\Services\Searchable;


class QueryColumnOption implements ByColumnOptions
{

    private $options;

    /**
     * QueryColumnOption constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->options = $options;
    }

    public function optionsByColumns(): array
    {
        return $this->options;
    }
}
