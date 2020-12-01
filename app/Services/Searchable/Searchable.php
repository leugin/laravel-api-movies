<?php


namespace App\Services\Searchable;



use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Searchable
{
    private $optionsMapRules;

    /**
     * Searchable constructor.
     * @param $optionsMapRules
     */
    public function __construct()
    {
        $this->optionsMapRules  = FactoryOptionResolverRules::makeByConfig();

    }


    /**
     * @param $query
     * @param QueryRules|object $byColumnSearchable
     * @param array $requestOptions
     * @return  Builder|Model
     */
    public function applyArray($query,  $byColumnSearchable, array $requestOptions = [])
    {

         foreach ($requestOptions as $k=>$value){
            $class = $this->optionsMapRules->make($k, $query, $byColumnSearchable );
            if($class){
                $class->apply($value);

            }
        }

        return  $query;
    }


}
