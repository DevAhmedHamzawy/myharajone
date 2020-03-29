<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Post extends Model implements Viewable
{
    use SoftDeletes, InteractsWithViews;
    
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
        return $this->hasMany('App\Comment')->whereNull('parent_id');
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
        $mainArea = Area::where('id', $secondArea->parent_id)->first() ?? 'غير محدد';
        return [$secondArea->name, $mainArea->name];
    }
}
