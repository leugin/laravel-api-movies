<?php


namespace App\Services\Searchable;


class FactoryOptionResolverRules
{

    public static function makeByConfig(){
        $config = config('searchable');
         return new self($config);
    }
    private  $resolverList;

    /**
     * FactoryOptionResolverRules constructor.
     * @param array $resolverList
     */
    public function __construct(array  $resolverList = [])
    {
        $this->resolverList = $resolverList;
    }

    public function make($key,  $query,  $rules):?ApplicableOptions{
        if($this->checkIsAvailable($key) && method_exists($rules, 'queryRules' ) && array_key_exists($key, $rules->queryRules())){

            $class = $this->resolverList[$key];
            return  new $class($query, $rules->queryRules()[$key]);
        }
        return null;

    }

    /**
     * @param $key
     * @return bool
     */
    private function checkIsAvailable($key): bool
    {
        return array_key_exists($key, $this->resolverList);
    }

}
