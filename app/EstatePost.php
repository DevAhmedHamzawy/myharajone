<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstatePost extends Post
{
    /**
     * Disable soft deletes for this model
     */
    public static function bootSoftDeletes() {}
}
