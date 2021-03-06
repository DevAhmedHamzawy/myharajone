<?php 

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class SortFilter implements Filter
{
    public function apply(Builder $builder, $value)
    {
        if($value !== null){
            return $builder->whereHas('estatePost', function($q) use ($value){
                $q->where('sort' , $value);
            });
        }    
    }
}