<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['title', 'introduction', 'tags', 'article', 'rating'];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function likes() {
    	return $this->hasMany('App\Like');
    }

    public function comments() {
    	return $this->hasMany('App\Comment');
    }

    public function subcomments() {
        return $this->hasMany('App\Subcomment');
    }

    public function delete() {
        $this->likes()->delete();
        $this->comments()->delete();
        $this->subcomments()->delete();
        return parent::delete();
    }
}
