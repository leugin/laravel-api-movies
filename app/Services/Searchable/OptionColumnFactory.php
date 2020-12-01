<?php


namespace App\Services\Searchable;


class OptionColumnFactory
{
    private $optionMapRules;



    public function make($query,  array $requestOptions):array {

        foreach ($requestOptions as $k=>$value){
           if(isset($this->optionMapRules[$k]) ){
              $resolveClass = $this->optionMapRules[$k];
              $class = new $resolveClass($query);
           }
        }

    }
}
