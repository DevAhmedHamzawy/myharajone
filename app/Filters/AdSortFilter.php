<?php 

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class AdSortFilter implements Filter
{
    public function apply(Builder $builder, $value)
    {
        if($value !== null){
            if(request()->ad_sort_id != 7){
                return $builder->where('ad_sort_id' , $value);
            }
        }
    }
}