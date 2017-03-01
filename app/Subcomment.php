<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcomment extends Model
{

	protected $fillable = ['user_id', 'article_id', 'comment_id', 'comment'];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function article() {
		return $this->belongsTo('App\Article');
	}

    public function comment() {
    	return $this->belongsTo('App\Comment');
    }
}
