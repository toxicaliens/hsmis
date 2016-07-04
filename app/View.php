<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    /*
     * The attributes that are mass assignable
     */
	protected $fillable = [
		'view_name',
		'parent_id',
		'view_url',
		'view_status'
	];
	
	public function childViews(){
		return $this->hasMany('App\View', 'parent_id', 'id');
	}
	
	public function parentView(){
		return $this->belongsTo('App\View', 'id');
	}
}
