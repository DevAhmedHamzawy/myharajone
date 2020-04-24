<?php

namespace App;

use App\Filters\BaseFilter;
use App\Traits\EnumValues;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model implements Viewable
{
    use SoftDeletes, InteractsWithViews, EnumValues;
    
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    protected $with = ['comments'];

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category')->withDefault([
            'name' => 'غير مصنف'
        ]);
    }

    public function area()
    {
        return $this->belongsTo('App\Area')->withDefault([
            'name' => 'غير محدد'
        ]);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'post_id')->whereLike(1);
    }

    public function dislikes()
    {
        return $this->hasMany('App\Like', 'post_id')->whereLike(-1);
    }

    public function favourites()
    {
        return $this->hasMany('App\Favourite');
    }

    public function reports()
    {
        return $this->hasMany('App\Report');
    }

    public function estatePost()
    {
        return $this->hasOne('App\EstatePost');
    }

    public function carPost()
    {
        return $this->hasOne('App\CarPost');
    }

    public function getcreateAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    //Get updated_at In Arabic With Format ('d M Y')
    public function getUpdateAtAttribute()
    {
        return Carbon::parse($this->updated_at)->translatedFormat('d M Y');
    }

    public function getallTagsAttribute()
    {
        $tags = unserialize($this->tags);
        $allTags = [];
        foreach ($tags as $tag) {
            array_push($allTags, Tag::find($tag)->name);
        }
        return $allTags;
    }

    public function getallServicesAttribute()
    {
        $services = unserialize($this->services);
        $allServices = [];
        foreach ($services as $service) {
            array_push($allServices, Tag::find($service)->name);
        }
        return $allServices;
    }

    //Get Main Area
    public static function getMainArea($id)
    {
        $area = Area::where('id', $id)->first();
        $secondArea = Area::where('id', $area->parent_id)->first() ?? 'غير محدد';
        if($secondArea != 'غير محدد'){ $mainArea = Area::where('id', $secondArea->parent_id)->first() ?? 'غير محدد'; }
        return [$secondArea->name ?? 'غير محدد', $mainArea->name ?? 'غير محدد'];
    }

    public static function scopeFilter(Builder $builder, $filters)
    {
        return (new BaseFilter(request()))->apply($builder, $filters);
    }   


    //Get Main Image Path
    public function getMainImgPathAttribute()
    {
        if(!empty($this->images)){
            $images = json_decode($this->images->img, true);
            if(file_exists(public_path() .'/storage/estates/'. $this->name . '/' .$images[0]))
            {
                return url('storage/estates/'. $this->name . '/' .$images[0]);
            }else{
                return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->id ) ) ) . "?d=identicon" . "&s=" . $size = 130;
            }
        }else{
            //return null;
            return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->id ) ) ) . "?d=identicon" . "&s=" . $size = 130;
        }
    }
}
