<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * fields that can be mass assigned
     * protects against SQL injection
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'published_at',
    ];

    /**
     * make date a Carbon object
     *
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * attribute for published_at is set to today as default
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    //diffForHumans

    /**
     * query attribute for scheduledToBePublished()
     */
    public function scopeScheduledToBePublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }

    /**
     * query attribute for published()
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags(){
	    return $this->belongsToMany( 'App\Tag' );
    }
}
