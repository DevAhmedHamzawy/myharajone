<?php 

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class TitleFilter implements Filter
{
    public function apply(Builder $builder, $value)
    {
        if($value !== null){
            return $builder->where('title', 'Like' , '%'.$value.'%');
        }
    }
}