<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    'category_id', 'post_type', 'title', 'description', 'started_at' , 'ended_at', 'price' ,'students_max' , 'status'
    ];

    public function scopePublished($query)
    {
      # un scope permettra de modifier la requête Eloquent standard
      return $query->where('status','published');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function picture()
    {
        return $this->hasOne(Picture::class);
    }
}
