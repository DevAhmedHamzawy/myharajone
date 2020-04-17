<?php 

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class AreaFilter implements Filter
{
    public function apply(Builder $builder, $value)
    {
        if($value !== null){
            if(request()->ad_sort_id == 7){
                return $builder->whereHas('profile', function($q) use ($value){
                    $q->where('area_id' , $value);
                });
            }else{
                return $builder->where('area_id' , $value);
            }
        }
    }
}