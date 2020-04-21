<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Category extends Model implements Viewable
{
    use InteractsWithViews;

    public static function getChildrenCategories($id)
    {
        return self::whereParentId($id)->get();
    }

}
