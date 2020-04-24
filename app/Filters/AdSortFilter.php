<?php 

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class AdSortFilter implements Filter
{
    public function apply(Builder $builder, $value)
    {
        if($value !== null){
            return $builder->where('ad_sort' , $value);
        }
    }
}