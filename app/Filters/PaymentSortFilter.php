<?php 

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class PaymentSortFilter implements Filter
{
    public function apply(Builder $builder, $value)
    {
        if($value !== null){
            return $builder->where('payment_sort' , $value);
        }
    }
}