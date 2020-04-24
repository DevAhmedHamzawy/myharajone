<?php 

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class PriceFilter implements Filter
{
    public function apply(Builder $builder, $value)
    {
        if($value !== null){
            return $builder->WhereBetween('price' , [0,$value]);
        }
    }
}